<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components\Stats;

use App\Models\Order;
use DateTime;
use DateTimeZone;
use Livewire\Component;

class TotalSales extends Component
{
    public $total = 0;
    public $date;

    public function mount() {
        $this->date = now()->format('Y-m-d');
        $this->getTotal();
    }

    public function getTotal() {
        $this->total = Order::where('payment_status', 'paid')->join('order_items', 'order_items.order_id', 'orders.id')->sum('total');
    }
    
    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.stats.total-sales');
    }
}
