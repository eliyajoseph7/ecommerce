<?php

namespace App\Livewire\Pages\Public\Layouts;

use App\Models\Cart;
use App\Models\MainCategory;
use App\Models\WishList;
use Illuminate\Support\Facades\Cookie;
use Livewire\Attributes\On;
use Livewire\Component;

class Header extends Component
{
    public $menus;
    public $cartCount;
    public $wishCount;

    public function mount() {
        $this->menus = MainCategory::with('categories')->get();
        $sessionId = Cookie::get('cart_session_id');
        $this->cartCount = Cart::where('session_id', $sessionId)->sum('quantity');
        $this->wishCount = WishList::where('session_id', $sessionId)->count();
    }

    #[On('cartUpdated')]
    public function updateCount($count) {
        $this->cartCount = $count;
    }

    #[On('wishListUpdated')]
    public function updateWishCount($count) {
        $this->wishCount = $count;
    }

    public function render()
    {
        return view('livewire.pages.public.layouts.header');
    }
}
