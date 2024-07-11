<?php

namespace App\Livewire\Pages\Public\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('pages.public.layouts.base')]
class CartItems extends Component
{
    public $loadData;
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
        $sessionId = $this->getSessionId();
        $this->cartItems = Cart::where('session_id', $sessionId)->with('item')->get();
        $this->cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
    }

    #[On('add_item')]
    public function addToCart($itemId)
    {
        $sessionId = $this->getSessionId();
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

    public function render()
    {
        return view('livewire.pages.public.cart.cart-items');
    }
}
