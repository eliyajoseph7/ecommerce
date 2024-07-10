<?php

namespace App\Livewire\Pages\Public\Items;

use App\Models\Category;
use App\Models\Item;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ItemDisplay extends Component
{
    public $data = [];

    // #[Reactive]
    public $loading = true;
    public $test;


    #[On('set_loading')]
    public function setLoading($value) {
        $this->loading = $value;
    }

    #[On('filter_items')]
    public function getData($category, $slug, $filter) {
        $this->loading = true;
        $query = Item::query();
        if($category == 'category') {
            $qs = Category::where('slug', $slug)->first();
            $query = $query->whereIn('sub_category_id', $qs->sub_categories->pluck('id')->toArray());
        } else {
            $qs = SubCategory::where('slug', $slug)->first();
            $query = $query->where('sub_category_id', $qs->id);
        }
        if(isset($filter['min_price'])) {
            $query = $query->where('price', '>=', $filter['min_price']);
        }
        if(isset($filter['max_price'])) {
            $query = $query->where('price', '<=', $filter['max_price']);
        }

        $this->data = $query->get();

        $this->loading = false;
        $this->render();
    }
    
    public function render()
    {
        return view('livewire.pages.public.items.item-display');
    }
}
