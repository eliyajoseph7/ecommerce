<?php

namespace App\Livewire\Pages\Public\Check\Components;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PaymentInfo extends Component
{
    #[Validate('required', as: 'pay method')]
    public $paymethod;


    #[On('submit_order')]
    public function save() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.pages.public.check.components.payment-info');
    }
}
