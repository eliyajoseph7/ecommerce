<?php

namespace App\Livewire\Pages\Public\Home\Components\Interest\Components;

use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;

class Popular extends Component
{
    public $popular = [];
    public $loading = true;
    public $loadMore = false;
    public $counter = 5;
    public $limit = 0;
    public $total = 0;

    public function mount() {
        $this->limit = $this->counter;
    }

    #[On('fetch_products')]
    public function fetchProducts() {

        $popular = Item::where('status', 'active')->orderByDesc('clicks')->latest();
        $this->total = $popular->count();
        $this->popular = $popular->limit($this->limit)->get();
        $this->loading = false;
        if(count($this->popular) < $this->total) {
            $this->loadMore = true;
        } else {
            $this->loadMore = false;
        }

        $this->loading = false;

    }


    #[On('load_more')]
    public function loadMoreData() {
        $this->loadMore = true;
        $this->loading = true;
        $this->limit += $this->counter;
        $this->fetchProducts();
    }

    public function render()
    {
        return view('livewire.pages.public.home.components.interest.components.popular');
    }
}
