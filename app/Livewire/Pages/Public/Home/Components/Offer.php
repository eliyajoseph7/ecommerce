<?php

namespace App\Livewire\Pages\Public\Home\Components;

use App\Models\Item;
use Livewire\Component;

class Offer extends Component
{
    public function render()
    {
        $offers = Item::whereNotNull('discount_id')->where('status', 'active')->with('images')->get();
        return view('livewire.pages.public.home.components.offer', compact('offers'));
    }
}
