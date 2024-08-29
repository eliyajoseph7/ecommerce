<?php

namespace App\Livewire\Pages\Public\Home\Components\Interest\Components;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Item;
use App\Models\ItemVisit;
use Livewire\Attributes\On;
use Livewire\Component;

class Recommendation extends Component
{
    public $recommendation = [];
    public $loading = true;
    public $loadMore = false;
    public $counter = 5;
    public $limit = 0;
    public $total = 0;

    public $sessionId;

    public function mount() {
        $this->limit = $this->counter;
        $this->sessionId = (new CustomerSessionController)->getSessionId();
    }

    #[On('fetch_products')]
    public function fetchProducts() {
        $visits = ItemVisit::where('session_id', $this->sessionId)
        ->join('items', 'items.id', 'item_visits.item_id')
        ->join('sub_categories', 'sub_categories.id', 'items.sub_category_id')
        ->join('categories', 'categories.id', 'sub_categories.category_id')
        ->select('categories.id')->distinct()
        ->pluck('categories.id');

        $recommendation = Item::where('status', 'active')->orderByDesc('clicks')
        ->whereHas('category', function($qs) use($visits) {
            $qs->whereIn('category_id', $visits);
        })->latest();
        $this->total = $recommendation->count();
        $this->recommendation = $recommendation->limit($this->limit)->get();
        $this->loading = false;
        if(count($this->recommendation) < $this->total) {
            $this->loadMore = true;
        } else {
            $this->loadMore = false;
        }

        $this->loading = false;

    }


    #[On('load_more_recommended')]
    public function loadMoreData() {
        $this->loadMore = true;
        $this->loading = true;
        $this->limit += $this->counter;
        $this->fetchProducts();
    }

    public function render()
    {
        return view('livewire.pages.public.home.components.interest.components.recommendation');
    }
}
