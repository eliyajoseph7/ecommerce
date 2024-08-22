<?php

namespace App\Livewire\Pages\Public\Items\Modals;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Customer;
use App\Models\ItemReview;
use Livewire\Attributes\Validate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ItemReviews extends ModalComponent
{
    public $action = 'add';
    public $reviewId;
    public $submitting = false;
    public $itemId;

    #[Validate('required')]
    public $score = 5;
    #[Validate('required')]
    public $comment;
    #[Validate('required', as: 'name')]
    public $customer;

    public function setRating($score)
    {
        $this->score = $score;
        // Handle rate save logic here
    }
    public function mount($id, $reviewId = null) {
        $this->itemId = $id;
        $sessionId = (new CustomerSessionController)->getSessionId();
        $customer = Customer::where('session_id', $sessionId)->first();

        $this->customer = $customer?->is_loggedin ? $customer?->fullname : null;
        if($reviewId) {
            $this->action = 'update';
            $this->reviewId = $reviewId;
            $review = ItemReview::find($reviewId);
            $this->customer = $customer->is_loggedin ? $review->customer : null;
            $this->score = $review->score;
            $this->comment = $review->comment;
        }
    }

    public function submit() {
        $this->submitting = true;
        $this->validate();
        if ($this->action == 'add') {
            $rating = new ItemReview;
            $rating->item_id = $this->itemId;
            $rating->session_id = (new CustomerSessionController)->getSessionId();
        } else {
            $rating = ItemReview::find($this->reviewId);
        }
        $rating->score = $this->score;
        $rating->comment = $this->comment;
        $rating->customer = $this->customer;
        $rating->save();
        
        $this->dispatch('successToast', message: $this->action == 'add' ? '🙌 Review submitted successfully!' : '🙌 Review updated successfully!');
        $this->submitting = false;
        $this->dispatch('load_reviews');
        $this->dispatch('load_review_updates', id: $this->reviewId); // for read more modal
        $this->closeModal();
    }
    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public static function destroyOnClose(): bool
    {
        return true;
    }
    public function render()
    {
        return view('livewire.pages.public.items.modals.item-reviews');
    }
}
