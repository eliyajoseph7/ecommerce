<?php

namespace App\Livewire\Pages\Public\Items;

use App\Models\ItemReview;
use Livewire\Attributes\On;
use Livewire\Component;

class Reviews extends Component
{
    public $itemId;
    public $reviews = [];
    public $counter = 1;
    public $limit = 0;
    public $total = 0;
    public $loadMore = false;
    public $loading = true;

    #[On('load_reviews')]
    public function getReviews() {
        $reviews = ItemReview::where('item_id', $this->itemId)->latest();
        $this->total = $reviews->count();
        $this->reviews = $reviews->limit($this->limit)->get();
        $this->loading = false;
        if(count($this->reviews) < $this->total) {
            $this->loadMore = true;
        } else {
            $this->loadMore = false;
        }
    }

    #[On('load_more_reviews')]
    public function loadMoreReviews() {
        $this->loadMore = true;
        $this->loading = true;
        $this->limit += $this->counter;
        $this->getReviews();
    }

    public function mount($itemId) {
        $this->itemId = $itemId;
        $this->limit = $this->counter;
        $this->getReviews();
    }

    public function render()
    {
        return view('livewire.pages.public.items.reviews');
    }
}
