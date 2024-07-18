<?php

namespace App\Livewire\Pages\Public\Check\Components;

use Livewire\Component;

class DeliveryInfo extends Component
{
    public $showBillAddress = false;

    public function toggleBillAddress() {
        $this->showBillAddress = !$this->showBillAddress;
    }
    
    public function render()
    {
        return view('livewire.pages.public.check.components.delivery-info');
    }
}
