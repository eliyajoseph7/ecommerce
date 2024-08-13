<?php

namespace App\Livewire\Pages\Admin\Orders;

use App\Models\Order;
use Livewire\Component;

class OrderView extends Component
{
    public $order;
    public $vatAmount = 0;
    public $totalAmount = 0;

    public function mount($orderId) {
        $this->order = Order::with(['orderItems', 'deliveryAddress', 'billingAddress', 'customer'])->find($orderId);
        $this->totalAmount = $this->order->orderItems->sum('total_price');
        $this->vatAmount = round(($this->totalAmount * 18) / (18 + 100));
    }

    public function render()
    {
        return view('livewire.pages.admin.orders.order-view');
    }
}
