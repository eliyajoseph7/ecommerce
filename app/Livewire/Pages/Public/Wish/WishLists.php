<?php

namespace App\Livewire\Pages\Public\Wish;

use App\Http\Controllers\Actions\ItemVisitController;
use App\Models\WishList;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class WishLists extends Component
{
    public $loadData = true;
    public $wishListItems = [];
    public $wishListCount = 0;

    public function mount()
    {
        if($this->loadData) {
            $this->loadWishList();
        }
    }

    public function loadWishList()
    {
        $sessionId = $this->getSessionId();
        $this->wishListItems = WishList::where('session_id', $sessionId)->with('item')->get();
        $this->wishListCount = WishList::where('session_id', $sessionId)->count();
    }

    #[On('wish_item')]
    public function addToWishList($itemId)
    {
        $sessionId = $this->getSessionId();
        $wishList = WishList::where('session_id', $sessionId)->where('item_id', $itemId)->first();

        if ($wishList) {

        } else {
            WishList::create([
                'session_id' => $sessionId,
                'item_id' => $itemId,
            ]);
        }

        $this->loadWishList();
        $this->dispatch('wishListUpdated', count: $this->wishListCount);
    }


    #[On('remove_wish_item')]
    public function removeItem($wishListId)
    {
        $wishList = WishList::find($wishListId);
        if ($wishList) {
            $wishList->delete();
            $this->loadWishList();
            $this->dispatch('wishListUpdated', $this->wishListCount);
        }
    }

    #[On('clear_wish_list')]
    public function clearList() {
        WishList::where('session_id', $this->getSessionId())?->delete();
        $this->loadWishList();
        $this->dispatch('wishListUpdated', $this->wishListCount);
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


    #[On('count_visit')]
    public function countVisit($itemId, $routeName, $routeArg) {
        $userId = auth()->check() ? auth()->id() : null;
        (new ItemVisitController)->recordVisit($itemId, $userId);
        return redirect()->route($routeName, $routeArg);
    }

    public function render()
    {
        $data = $this->wishListItems;
        return view('livewire.pages.public.wish.wish-lists', compact('data'));
    }
}
