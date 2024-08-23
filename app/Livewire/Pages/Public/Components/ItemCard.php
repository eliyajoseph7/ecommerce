<?php

namespace App\Livewire\Pages\Public\Components;

use Livewire\Component;

class ItemCard extends Component
{
    // public $item;

    // public function mount($item)
    // {
    //     $this->item = $item;
    // }
    
    public function render()
    {
        return view('livewire.pages.public.components.item-card');
    }
}
