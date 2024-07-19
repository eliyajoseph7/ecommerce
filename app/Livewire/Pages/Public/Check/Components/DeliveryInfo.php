<?php

namespace App\Livewire\Pages\Public\Check\Components;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DeliveryInfo extends Component
{
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
    

    public function toggleBillAddress() {
        $this->showBillAddress = !$this->showBillAddress;
    }


    #[On('submit_order')]
    public function save() {
        $this->validate();
    }
    
    public function render()
    {
        return view('livewire.pages.public.check.components.delivery-info');
    }
}
