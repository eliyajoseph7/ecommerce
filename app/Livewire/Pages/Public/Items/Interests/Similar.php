<?php

namespace App\Livewire\Pages\Public\Items\Interests;

use App\Http\Controllers\Actions\ItemVisitController;
use App\Models\Item;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use Livewire\Component;

class Similar extends Component
{
    public $activeItem;
    public $category;
    public $similar = [];
    public $loading = true;
    public $loadMore = false;
    public $counter = 5;
    public $limit = 0;
    public $total = 0;

    
    public function mount(){
        $this->limit = $this->counter;
        $this->fetchSimilarProducts();
    }
    public function fetchSimilarProducts() {
        $subCategories = SubCategory::where('category_id', $this->category->id)->pluck('id');
        $similar = Item::where('status', 'active')->whereIn('sub_category_id', $subCategories)->where('id', '!=', $this->activeItem)->latest();
        
        $this->total = $similar->count();
        $this->similar = $similar->limit($this->limit)->get();
        $this->loading = false;
        if(count($this->similar) < $this->total) {
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
        $this->fetchSimilarProducts();
    }

    #[On('count_visit')]
    public function countVisit($itemId, $routeName, $routeArg) {
        $userId = auth()->check() ? auth()->id() : null;
        (new ItemVisitController)->recordVisit($itemId, $userId);
        return redirect()->route($routeName, $routeArg);
    }

    public function render()
    {
        return view('livewire.pages.public.items.interests.similar');
    }
}
