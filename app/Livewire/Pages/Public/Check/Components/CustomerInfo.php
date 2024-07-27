<?php

namespace App\Livewire\Pages\Public\Check\Components;

use App\Helpers\Helper;
use App\Http\Controllers\CustomerSessionController;
use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CustomerInfo extends Component
{
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

    public function mount()
    {
        if (Helper::is_auth()) {
            $sessionId = (new CustomerSessionController)->getSessionId();
            $customer = Customer::where('session_id', $sessionId)->first();

            $this->first_name = $customer->first_name;
            $this->last_name = $customer->last_name;
            $this->phone = $customer->phone;
            $this->email = $customer->email;
            $this->company = $customer->company;
            $this->tin = $customer->tin;
        }
    }

    public function updatedFirstName() {
        $this->dispatch('update_billing', fname: $this->first_name, lname: $this->last_name);
    }


    #[On('submit_order')]
    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.pages.public.check.components.customer-info');
    }
}
