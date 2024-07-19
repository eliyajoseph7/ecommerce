<?php

namespace App\Livewire\Pages\Public\Check\Components;

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


    #[On('submit_order')]
    public function save() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.pages.public.check.components.customer-info');
    }
}
