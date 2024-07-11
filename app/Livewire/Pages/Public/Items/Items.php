<?php

namespace App\Livewire\Pages\Public\Items;

use App\Models\Category;
use App\Models\Item;
use App\Models\SubCategory;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Items extends Component
{
    public $view;
    public $slug;
    public $query = [];
    public $data;
    public $context;
    public $loading = true;
    public $category = '';

    public $qs;
    public $quantity = 1;

    // filter price
    public $minPrice = 1000;
    public $maxPrice = 1000000000;
    public $selectedMinPrice = 1000;
    public $selectedMaxPrice = 1000000000;


    public function mount($slug)
    {
        $this->slug = $slug;
        if ($this->isCategorySlug($this->slug)) {
            $this->category = 'category';
        } else if ($this->isSubCategorySlug($this->slug)) {
            $this->category = 'sub_category';
        } else if ($this->isItemSlug($this->slug)) {
            $this->category = 'item';
        }
        
        $this->getData();
    }

    public function updatingSelectedMinPrice() {
        $this->getFilters();
    }
    public function updatingSelectedMaxPrice() {
        $this->getFilters();
    }

    public function getData() {
        if ($this->category == 'category') {
            $qs = Category::where('slug', $this->slug)->first();
            $this->view = 'livewire.pages.public.items.items';
            $this->context = [
                'category' => $qs,
                'sub_categories' => $qs->sub_categories,
                'level' => 1
            ];
            $this->qs = $qs;
        } else if($this->category == 'sub_category') {
            $qs = SubCategory::where('slug', $this->slug)->first();
            $this->view = 'livewire.pages.public.items.items';
            $this->context = [
                'category' => $qs->category,
                'sub_categories' => SubCategory::where('category_id', $qs->category_id)->get(),
                'level' => 2
            ];
            $this->qs = $qs;
        } elseif ($this->category == 'item') {
            // no need for updating this->query here
            $this->data = Item::where('slug', $this->slug)->first();
            $this->view = 'livewire.pages.public.items.item-details';
            $this->context = [
                'category' => $this->data->category->category,
                'sub_category' => $this->data->category,
                'active_img' => $this->data->images->first()->image,
            ];
        } else {
            abort(404);
        }
        $this->loading = false;
    }

    protected function isCategorySlug($slug)
    {
        return Category::where('slug', $slug)->exists();
    }

    protected function isSubCategorySlug($slug)
    {
        return SubCategory::where('slug', $slug)->exists();
    }

    protected function isItemSlug($slug)
    {
        return Item::where('slug', $slug)->exists();
    }

    // update active image for image details view
    #[On('update_active_img')]
    public function updateActiveImg($image) {
        $this->context['active_img'] = $image;
    }

    public function render()
    {
        // $this->getData();
        return view($this->view);
    }

    public function incrementQuantity() {
        $this->quantity +=1;
    }

    public function decrementQuantity() {
        if($this->quantity > 1) {
            $this->quantity -=1;
        }
    }

    #[On('set_selected_min_price')]
    public function updateMinPrice($value)
    {
        $this->selectedMinPrice = $value;
        $this->dispatch('set_loading', value: 'true');
        $this->getFilters();
    }

    #[On('set_selected_max_price')]
    public function updateMaxPrice($value)
    {
        $this->selectedMaxPrice = $value;
        $this->getFilters();
    }

    #[On('call_filter')]
    public function getFilters() {
        $context = [
            'min_price' => $this->selectedMinPrice,
            'max_price' => $this->selectedMaxPrice,
        ];

        $this->dispatch('filter_items', category: $this->category, slug: $this->slug, filter: $context);
    }
}
