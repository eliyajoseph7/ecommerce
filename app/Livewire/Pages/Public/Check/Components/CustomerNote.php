<?php

namespace App\Livewire\Pages\Public\Check\Components;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerNote extends Component
{
    public $subscribe = false;
    public $note;


    #[On('submited_order')]
    public function validityCheck() {
        $this->validate();
    }

    #[On('save_note')]
    public function save($order_id, $customer_id) {
        $order = Order::find($order_id);
        if($order) {
            $order->note = $this->note;
            $order->save();
        }

        $customer = Customer::find($customer_id);
        if($customer) {
            $customer->subscribed = $this->subscribe ? '1' : '0';
            $customer->save();
        }

        $item_ids = OrderItem::where('order_id', $order_id)->pluck('item_id');
        Item::whereIn('id', $item_ids)->increment('ordered');

        $sessionId = (new CustomerSessionController)->getSessionId();
        Cart::where('session_id', $sessionId)?->delete();

        $this->dispatch('order_completed');
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.pages.public.check.components.customer-note');
    }
}
