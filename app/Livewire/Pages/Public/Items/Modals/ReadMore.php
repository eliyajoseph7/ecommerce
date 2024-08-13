<?php

namespace App\Livewire\Pages\Public\Items\Modals;

use App\Models\ItemReview;
use Livewire\Attributes\On;
use LivewireUI\Modal\ModalComponent;

class ReadMore extends ModalComponent
{
    public $review;

    #[On('load_review_updates')]
    public function mount($id) {
        if($id)
        $this->review = ItemReview::find($id);
    }

    public function render()
    {
        return view('livewire.pages.public.items.modals.read-more');
    }
}
