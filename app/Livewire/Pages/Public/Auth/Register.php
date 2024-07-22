<?php

namespace App\Livewire\Pages\Public\Auth;

use App\Models\Cart;
use App\Models\Country;
use App\Models\District;
use App\Models\ItemVisit;
use App\Models\Region;
use App\Models\Village;
use App\Models\Ward;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Register extends Component
{
    public $toggleBillAddress = false;
    public $districts = [];
    public $wards = [];
    public $villages = [];
    public $billingDistricts = [];
    public $billingWards = [];
    public $billingVillages = [];

    public $subscribe = false;

    // 
    #[Validate('required')]
    public $first_name;
    #[Validate('required')]
    public $last_name;
    #[Validate('required')]
    public $phone;
    #[Validate('required')]
    public $email;
    public $company;
    public $tin;
    #[Validate('required|confirmed')]
    public $password;
    #[Validate('required')]
    public $password_confirmation;

    // delivery & billing info

    #[Validate('required', as: 'region')]
    public $region_id;
    #[Validate('required', as: 'district')]
    public $district_id;
    #[Validate('required', as: 'ward')]
    public $ward_id;
    #[Validate('required', as: 'village/street')]
    public $village_id;
    #[Validate('required', as: 'address')]
    public $address;
    public $billing = [
        'first_name',
        'last_name',
        'region_id',
        'district_id',
        'ward_id',
        'village_id',
        'address',
    ];

    protected $rules = [
        'billing.first_name' => 'required',
        'billing.last_name' => 'required',
        'billing.region_id' => 'required',
        'billing.district_id' => 'required',
        'billing.ward_id' => 'required',
        'billing.village_id' => 'required',
        'billing.address' => 'required',
    ];

    protected $messages = [
        'billing.*.required' => 'This field is required'
    ];
    

    public function toggleBillAddress() {
        $this->toggleBillAddress = !$this->toggleBillAddress;
    }

    public function updatedRegionId() {
        $this->districts = District::where('region_id', $this->region_id)->orderBy('name')->get();
        $this->reset(['wards', 'ward_id', 'villages', 'village_id']);
    }
    public function updatedDistrictId() {
        $this->wards = Ward::where('district_id', $this->district_id)->orderBy('name')->get();
        $this->reset(['villages', 'village_id']);
    }
    public function updatedWardId() {
        $this->villages = Village::where('ward_id', $this->ward_id)->orderBy('name')->get();
    }

    public function updatedBilling($value, $name)
    {
        // dd($name);

        if ($name === 'region_id') {
            $this->billingDistricts = District::where('region_id', $value)->get();
            $this->billingWards = [];
            $this->billing['ward_id'] = null;

            $this->billingVillages = [];
            $this->billing['village_id'] = null;
        }

        if ($name === 'district_id') {
            $this->billingWards = Ward::where('district_id', $value)->get();
            $this->billingVillages = [];
            $this->billing['village_id'] = null;
        }
    }

    public function submit() {

        $sessionId = $this->getSessionId();
        $this->validate();
        $customer = Customer::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'company' => $this->company,
            'tin' => $this->tin,
            'session_id' => $sessionId,
            'subscribed' => $this->subscribe ? '1' : '0',
        ]);

        $country = Country::where('country_code', 'TZ')->first()?->id;

        // delivery information
        DeliveryAddress::create([
            'customer_id' => $customer->id,
            'country_id' => $country, 
            'region_id' => $this->region_id, 
            'district_id' => $this->district_id, 
            'ward_id' => $this->ward_id,    
            'village_id' => $this->village_id,
            'address' => $this->address,
        ]);

        // billing information 
        BillingAddress::create([
            'customer_id' => $customer->id,
            'first_name' => $this->billing['first_name'],
            'last_name' => $this->billing['last_name'],
            'country_id' => $country, 
            'region_id' => $this->billing['region_id'], 
            'district_id' => $this->billing['district_id'], 
            'ward_id' => $this->billing['ward_id'],    
            'village_id' => $this->billing['village_id'],
            'address' => $this->billing['address'],
        ]);

        Cart::where('session_id', $sessionId)->update([
            'customer_id' => $customer->id
        ]);

        ItemVisit::where('session_id', $sessionId)->update([
            'customer_id' => $customer->id
        ]);

        session()->flash('info', [
            'type' => 'success',
            'message' => 'Account successfully created.',
        ]);

        return redirect()->route('signin');
    }

    private function getSessionId()
    {
        $sessionId = Cookie::get('cart_session_id');

        if (!$sessionId) {
            $sessionId = Str::uuid()->toString();
            Cookie::queue('cart_session_id', $sessionId, 60 * 24 * 90); // 90 days
        }

        return $sessionId;
    }

    public function render()
    {
        $regions = Region::orderBy('name')->get();
        $billingRegions = $regions;
        return view('livewire.pages.public.auth.register', compact('regions', 'billingRegions'));
    }
}
