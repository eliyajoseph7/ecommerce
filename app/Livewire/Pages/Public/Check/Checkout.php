<?php

namespace App\Livewire\Pages\Public\Check;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Checkout extends Component
{
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


    private function getSessionId()
    {
        $sessionId = Cookie::get('cart_session_id');

        if (!$sessionId) {
            $sessionId = Str::uuid()->toString();
            Cookie::queue('cart_session_id', $sessionId, 60 * 24 * 90); // 90 days
        }

        return $sessionId;
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

    public function loadCart()
    {
        $sessionId = $this->getSessionId();
        $this->items = Cart::where('session_id', $sessionId)->with('item')->get();
        $this->cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
    }

    public function render()
    {
        return view('livewire.pages.public.check.checkout');
    }
}
