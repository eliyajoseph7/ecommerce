<?php

namespace App\Livewire\Pages\Public\Items\Interests;

use App\Http\Controllers\Actions\ItemVisitController;
use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;

class Random extends Component
{
    public $activeItem;
    public $random = [];
    public $loading = true;
    public $loadMore = false;
    public $counter = 5;
    public $limit = 0;
    public $total = 0;

    
    public function mount(){
        $this->limit = $this->counter;
        $this->fetchRandomProducts();
    }
    public function fetchRandomProducts() {
        $random = Item::where('status', 'active')->where('id', '!=', $this->activeItem)->latest();
        $this->total = $random->count();
        $this->random = $random->limit($this->limit)->get();
        $this->loading = false;
        if(count($this->random) < $this->total) {
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
        $this->fetchRandomProducts();
    }

    #[On('count_visit')]
    public function countVisit($itemId, $routeName, $routeArg) {
        $userId = auth()->check() ? auth()->id() : null;
        (new ItemVisitController)->recordVisit($itemId, $userId);
        return redirect()->route($routeName, $routeArg);
    }

    public function render()
    {
        return view('livewire.pages.public.items.interests.random');
    }
}
