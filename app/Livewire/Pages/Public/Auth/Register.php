<?php

namespace App\Livewire\Pages\Public\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\CustomerSessionController;
use App\Models\BillingAddress;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\District;
use App\Models\ItemVisit;
use App\Models\Order;
use App\Models\Region;
use App\Models\Village;
use App\Models\Ward;
use App\Models\WishList;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Register extends Component
{
    public $redirecting = false;
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
    
    #[On('toggle_bill_info')]
    public function updateBillAddress() {
        $this->toggleBillAddress = !$this->toggleBillAddress;
        if($this->toggleBillAddress) {
            $this->billing['first_name'] = $this->first_name;
            $this->billing['last_name'] = $this->last_name;
            $this->billing['region_id'] = $this->region_id;
            $this->billing['district_id'] = $this->district_id;
            $this->billing['ward_id'] = $this->ward_id;
            $this->billing['village_id'] = $this->village_id;
            $this->billing['address'] = $this->address;

        } else {
            $this->reset('billing');
        }
    }

    public function updatedRegionId() {
        $this->districts = District::where('region_id', $this->region_id)->orderBy('name')->get();
        $this->reset(['district_id', 'wards', 'ward_id', 'villages', 'village_id']);
    }
    public function updatedDistrictId() {
        $this->wards = Ward::where('district_id', $this->district_id)->orderBy('name')->get();
        $this->reset(['ward_id', 'villages', 'village_id']);
    }
    public function updatedWardId() {
        $this->villages = Village::where('ward_id', $this->ward_id)->orderBy('name')->get();
        $this->reset('village_id');
    }

    public function updatedBilling($value, $name)
    {
        // dd($name);

        if ($name === 'region_id') {
            $this->billingDistricts = District::where('region_id', $value)->get();
            $this->reset(['billing.district_id', 'billing.wards', 'billing.ward_id', 'billing.villages', 'billing.village_id']);
        }

        if ($name === 'district_id') {
            $this->billingWards = Ward::where('district_id', $value)->get();
            $this->reset(['billing.ward_id', 'billing.villages', 'billing.village_id']);
        }
        if ($name === 'ward_id') {
            $this->billingVillages = Village::where('ward_id', $value)->get();
            $this->reset('billing.village_id');
        }
    }

    public function submit() {

        $sessionId = (new CustomerSessionController)->getSessionId();
        $newSessionId = null;

        $this->validate();
        $check = Customer::where('session_id', $sessionId)->exists();
        if($check) {
            $newSessionId = Str::uuid()->toString();
            Cookie::queue(Cookie::make('cart_session_id', $newSessionId, 60 * 24 * 90)); // 90 days
        }
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
            'customer_id' => $customer->id,
            'session_id' => $newSessionId ? $newSessionId : $sessionId
        ]);

        ItemVisit::where('session_id', $sessionId)->update([
            'customer_id' => $customer->id,
            'session_id' => $newSessionId ? $newSessionId : $sessionId
        ]);

        WishList::where('session_id', $sessionId)->update([
            'customer_id' => $customer->id,
            'session_id' => $newSessionId ? $newSessionId : $sessionId
        ]);

        Order::where('session_id', $sessionId)->update([
            'session_id' => $newSessionId ? $newSessionId : $sessionId,    
            'customer_id' => $customer->id    
        ]);

        $customer->session_id = $newSessionId ? $newSessionId : $sessionId;
        $customer->loggedin = '1';
        $customer->last_login = now();
        $customer->save();

        session()->flash('info', [
            'type' => 'success',
            'message' => 'Account successfully created.',
        ]);

        $this->dispatch('success', 'Account successfully created.');
        $this->redirecting = true;
    }
    
    #[On('registered')]
    public function redirectTo() {
        return redirect()->to('/' . '#items');
    }

    public function mount() {
        if(Helper::is_auth()) {
            $this->redirectTo();
        }
    }


    public function render()
    {
        $regions = Region::orderBy('name')->get();
        $billingRegions = $regions;
        return view('livewire.pages.public.auth.register', compact('regions', 'billingRegions'));
    }
}
