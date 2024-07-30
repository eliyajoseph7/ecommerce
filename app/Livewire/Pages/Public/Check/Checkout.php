<?php

namespace App\Livewire\Pages\Public\Check;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Checkout extends Component
{
    public $redirecting = false;

    #[Validate('accepted', as: 'terms & conditions', message:'You must agree to our terms & conditions')]
    public $terms = false;

    public $items = [];
    public function mount()
    {
        $this->loadCart();
    }

    public function updateQuantity($cartId, $quantity)
    {
        $cart = Cart::find($cartId);
        if ($cart) {
            $cart->update(['quantity' => $quantity]);
            $this->loadCart();
            $this->dispatch('cartUpdated', $this->cartCount);
        }
    }

    #[On('remove_cart_item')]
    public function removeItem($cartId)
    {
        $cart = Cart::find($cartId);
        if ($cart) {
            $cart->delete();
            $this->loadCart();
            $this->dispatch('cartUpdated', $this->cartCount);
        }
    }


    public function incrementQuantity($cartId) {
        Cart::find($cartId)->increment('quantity');
        $this->loadCart();
    }

    public function decrementQuantity($cartId) {
        $cart = Cart::find($cartId);
        if($cart->quantity == 1) {
            $this->removeItem($cartId);
        } else {
            $cart->decrement('quantity');
        }
        $this->loadCart();
    }

    #[On('checkout')]
    public function submitOrder() {
        $this->validate();
        $this->dispatch('submit_order');
    }

    #[On('order_completed')]
    public function orderCompleted() {
        $this->redirecting = true;
        $this->loadCart();
    }

    public function loadCart()
    {
        $sessionId = (new CustomerSessionController)->getSessionId();
        $this->items = Cart::where('session_id', $sessionId)->with('item')->get();
        $this->cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
        // dd($this->items->sum('cost'));
    }

    #[On('to_order_screen')]
    public function redirectAfterCheckout()
    {
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.pages.public.check.checkout');
    }
}
