<?php

namespace App\Livewire\Pages\Public\Check\Components;

use App\Helpers\Helper;
use App\Http\Controllers\CustomerSessionController;
use App\Models\BillingAddress;
use App\Models\Country;
use App\Models\Customer;
use App\Models\DeliveryAddress;
use App\Models\District;
use App\Models\Region;
use App\Models\Village;
use App\Models\Ward;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DeliveryInfo extends Component
{
    public $redirecting = false;
    // public $toggleBillAddress = false;
    public $districts = [];
    public $wards = [];
    public $villages = [];
    public $billingDistricts = [];
    public $billingWards = [];
    public $billingVillages = [];

    public $showBillAddress = false;

    #[Validate('required')]
    public $region_id;
    #[Validate('required')]
    public $district_id;
    #[Validate('required')]
    public $ward_id;
    #[Validate('required', as: 'village/street')]
    public $village_id;
    #[Validate('required')]
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


    public function toggleBillAddress()
    {
        $this->showBillAddress = !$this->showBillAddress;
        if (!$this->showBillAddress) {
            $this->getData();
        } else {
            $this->reset('billing');
        }
    }

    public function getData()
    {
        if (Helper::is_auth()) {
            $sessionId = (new CustomerSessionController)->getSessionId();
            $customer = Customer::with('billingAddress')->where('session_id', $sessionId)->first();

            $this->region_id = $customer->region_id;
            $this->district_id = $customer->district_id;
            $this->ward_id = $customer->ward_id;
            $this->village_id = $customer->village_id;
            $this->address = $customer->address;

            // billing
            $this->billing['first_name'] = $customer->first_name;
            $this->billing['last_name'] = $customer->last_name;
            $this->region_id = $customer->billingAddress->region_id;
            $this->district_id = $customer->billingAddress->district_id;
            $this->ward_id = $customer->billingAddress->ward_id;
            $this->village_id = $customer->billingAddress->village_id;
            $this->address = $customer->billingAddress->address;

            $this->getDistricts();
            $this->getwards();
            $this->getVillages();
        }
    }

    public function getDistricts()
    {
        $this->districts = District::where('region_id', $this->region_id)->orderBy('name')->get();
    }

    public function getwards()
    {
        $this->wards = ward::where('district_id', $this->district_id)->orderBy('name')->get();
    }
    public function getVillages()
    {
        $this->villages = Village::where('ward_id', $this->ward_id)->orderBy('name')->get();
    }

    public function updatedRegionId()
    {
        $this->getDistricts();
        $this->reset(['district_id', 'wards', 'ward_id', 'villages', 'village_id']);
    }
    public function updatedDistrictId()
    {
        $this->getwards();
        $this->reset(['ward_id', 'villages', 'village_id']);
    }
    public function updatedWardId()
    {
        $this->getVillages();
        $this->reset('village_id');
    }

    #[On('update_billing')]
    public function setNames($fname, $lname) {
        if(!$this->showBillAddress) {
            $this->billing['first_name'] = $fname;
            $this->billing['last_name'] = $lname;
        }
    }

    public function mount()
    {
        $this->getData();
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

    #[On('submit_order')]
    public function validityCheck()
    {
        $this->validate();
    }

    #[On('complete_order_details')]
    public function save($customer_id)
    {
        
        $country = Country::where('country_code', 'TZ')->first()?->id;

        // delivery information
        $delivery = DeliveryAddress::updateOrCreate(['customer_id' => $customer_id ?? null], [
            'country_id' => $country, 
            'region_id' => $this->region_id, 
            'district_id' => $this->district_id, 
            'ward_id' => $this->ward_id,    
            'village_id' => $this->village_id,
            'address' => $this->address,
        ]);

        // billing information 
        $billing = BillingAddress::updateOrCreate(['customer_id' => $customer_id ?? null], [
            'first_name' => $this->billing['first_name'],
            'last_name' => $this->billing['last_name'],
            'country_id' => $country, 
            'region_id' => $this->billing['region_id'] ?? $this->region_id, // this billing['region_id] will be null if is the same as delivery region_id 
            'district_id' => $this->billing['district_id'] ?? $this->district_id, // this billing['district_id] will be null if is the same as delivery district_id 
            'ward_id' => $this->billing['ward_id'] ?? $this->ward_id, // this billing['ward_id] will be null if is the same as delivery ward_id    
            'village_id' => $this->billing['village_id'] ?? $this->village_id, // this billing['village_id] will be null if is the same as delivery village_id
            'address' => $this->billing['address'] ?? $this->address, // this billing['address] will be null if is the same as delivery address,
        ]);

        $this->dispatch('save_order', customer_id: $customer_id, delivery_address_id: $delivery->id, billing_address_id: $billing->id);
    }

    public function render()
    {
        $regions = Region::orderBy('name')->get();
        $billingRegions = $regions;
        return view('livewire.pages.public.check.components.delivery-info', compact('regions', 'billingRegions'));
    }
}
