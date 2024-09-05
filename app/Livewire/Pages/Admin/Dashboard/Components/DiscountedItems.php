<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components;

use App\Models\Item;
use Livewire\Component;

class DiscountedItems extends Component
{
    public $data;
    public $date;
    public $loading = false;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->getData();
    }

    public function getData()
    {
        $this->loading = true;
        $this->data = Item::whereNotNull('discount_id')->with(['discount'])->get();
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.discounted-items');
    }
}
