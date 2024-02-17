<?php

namespace App\Livewire\Pages\Public\Layouts;

use App\Models\MainCategory;
use Livewire\Component;

class Header extends Component
{
    public $menus;

    public function mount() {
        $this->menus = MainCategory::with('categories')->get();
    }

    public function render()
    {
        return view('livewire.pages.public.layouts.header');
    }
}
