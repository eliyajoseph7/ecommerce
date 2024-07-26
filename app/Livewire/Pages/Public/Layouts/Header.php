<?php

namespace App\Livewire\Pages\Public\Layouts;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Cart;
use App\Models\Customer;
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
        $this->menus = MainCategory::with(['categories' => function($qs) {
            return $qs->where('status', 'active');
        }])->where('status', 'active')->orderBy('rank')->get();
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

    #[On('signout')]
    public function signout() {
        $customer = Customer::where('session_id', (new CustomerSessionController)->getSessionId())->first();
        if($customer) {
            $customer->loggedin = '0';
            $customer->save();
        }
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.pages.public.layouts.header');
    }
}
