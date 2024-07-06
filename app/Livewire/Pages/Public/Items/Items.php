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
    public $data;
    public $context;

    public function mount($slug)
    {
        $this->slug = $slug;

        if ($this->isCategorySlug($slug)) {
            $this->data = Category::where('slug', $slug)->first();
            $this->view = 'livewire.pages.public.items.items';
        } else if($this->isSubCategorySlug($slug)) {
            $this->view = 'livewire.pages.public.items.items';

        } elseif ($this->isItemSlug($slug)) {
            $this->data = Item::where('slug', $slug)->first();
            $this->view = 'livewire.pages.public.items.item-details';
            $this->context = [
                'category' => $this->data->category->category,
                'sub_category' => $this->data->category,
                'active_img' => $this->data->images->first()->image,
            ];
        } else {
            abort(404);
        }
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
        $data = $this->data;
        $context = $this->context;
        return view($this->view);
    }

}
