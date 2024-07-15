<?php

namespace App\Livewire\Pages\Public\Items\Interests;

use App\Http\Controllers\Actions\ItemVisitController;
use App\Models\Item;
use Livewire\Attributes\On;
use Livewire\Component;

class Random extends Component
{
    public $activeItem;
    public $loading = true;
    public $random = [];

    public function mount(){
        $this->fetchSimilarProducts();
    }
    public function fetchSimilarProducts() {
        $this->random = Item::where('id', '!=', $this->activeItem)->get();

        $this->loading = false;

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
