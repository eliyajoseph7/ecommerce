<?php
/*
* This component is not used, the view is rendered from Items component.
*/
namespace App\Livewire\Pages\Public\Items;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('pages.public.layouts.base')]
class ItemDetails extends Component
{
    public function render()
    {
        return view('livewire.pages.public.items.item-details');
    }
}
