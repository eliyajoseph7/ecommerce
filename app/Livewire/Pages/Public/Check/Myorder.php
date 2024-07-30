<?php

namespace App\Livewire\Pages\Public\Check;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Order;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Myorder extends Component
{
    public $orders;

    public function mount() {
        $this->loadOrders();
    }

    public function loadOrders() {
        $sessionId = (new CustomerSessionController)->getSessionId();
        $this->orders = Order::where('session_id', $sessionId)->with('orderItems')->latest()->get();
    }

    public function render()
    {
        return view('livewire.pages.public.check.myorder');
    }
}
