<?php

namespace App\Livewire\Pages\Public\Items\Interests;

use App\Models\Item;
use Livewire\Component;

class Random extends Component
{
    public $activeItem;
    public $loading = true;
    public $random = [];

    public function mount(){
        $this->fetchSimilarProducts();
    }
    public function fetchSimilarProducts() {
        $this->random = Item::where('id', '!=', $this->activeItem)->get();

        $this->loading = false;

    }
    public function render()
    {
        return view('livewire.pages.public.items.interests.random');
    }
}
