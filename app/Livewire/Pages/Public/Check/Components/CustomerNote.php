<?php

namespace App\Livewire\Pages\Public\Check\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class CustomerNote extends Component
{
    public $subscribe = false;
    public $note;


    #[On('submited_order')]
    public function save($orderId) {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.pages.public.check.components.customer-note');
    }
}
