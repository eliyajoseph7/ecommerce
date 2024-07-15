<?php

namespace App\Livewire\Pages\Public\Home\Components\Interest;

use App\Http\Controllers\Actions\ItemVisitController;
use Livewire\Attributes\On;
use Livewire\Component;

class Interests extends Component
{

    #[On('count_visit')]
    public function countVisit($itemId, $routeName, $routeArg) {
        $userId = auth()->check() ? auth()->id() : null;
        (new ItemVisitController)->recordVisit($itemId, $userId);
        return redirect()->route($routeName, $routeArg);
    }
    public function render()
    {
        return view('livewire.pages.public.home.components.interest.interests');
    }
}
