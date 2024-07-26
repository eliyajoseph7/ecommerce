<?php

namespace App\Livewire\Pages\Public\Cart;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class CartItems extends Component
{
    public $loadData = true;
    public $cartItems = [];
    public $cartCount = 0;

    protected $listeners = ['addToCart'];


    public function mount()
    {
        if($this->loadData) {
            $this->loadCart();
        }
    }

    public function loadCart()
    {
        $sessionId = (new CustomerSessionController)->getSessionId();
        $this->cartItems = Cart::where('session_id', $sessionId)->with('item')->get();
        $this->cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
    }

    #[On('add_item')]
    public function addToCart($itemId)
    {
        $sessionId = (new CustomerSessionController)->getSessionId();
        $cart = Cart::where('session_id', $sessionId)->where('item_id', $itemId)->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'session_id' => $sessionId,
                'item_id' => $itemId,
                'quantity' => 1,
            ]);
        }

        $this->loadCart();
        $this->dispatch('cartUpdated', count: $this->cartCount);
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


    #[On('clear_cart')]
    public function clearCart() {
        Cart::where('session_id', (new CustomerSessionController)->getSessionId())?->delete();
        $this->loadCart();
        $this->dispatch('cartUpdated', $this->cartCount);
    }


    public function incrementQuantity($cartId) {
        $cart = Cart::find($cartId)->increment('quantity');
        $this->loadCart();
    }

    public function decrementQuantity($cartId) {
        $cart = Cart::find($cartId);
        // dump($cart);
        if($cart->quantity == 1) {
            $this->removeItem($cartId);
        } else {
            $cart->decrement('quantity');
        }
        $this->loadCart();
    }

    public function render()
    {

        $data = collect($this->cartItems);
        return view('livewire.pages.public.cart.cart-items', compact('data'));
    }
}
