<?php

namespace App\Livewire\Pages\Public\Items\Interests;

use App\Models\Item;
use App\Models\SubCategory;
use Livewire\Component;

class Similar extends Component
{
    public $activeItem;
    public $category;
    public $loading = true;
    public $similar = [];

    public function mount(){
        $this->fetchSimilarProducts();
    }
    public function fetchSimilarProducts() {
        $subCategories = SubCategory::where('category_id', $this->category->id)->pluck('id');
        $this->similar = Item::whereIn('sub_category_id', $subCategories)->where('id', '!=', $this->activeItem)->get();

        $this->loading = false;

    }

    public function render()
    {
        return view('livewire.pages.public.items.interests.similar');
    }
}
