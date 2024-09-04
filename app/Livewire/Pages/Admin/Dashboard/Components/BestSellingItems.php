<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BestSellingItems extends Component
{
    public $data;
    public $date;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->getData();
    }

    public function getData()
    {
        $query = Order::query()->join('order_items', 'order_items.order_id', 'orders.id')->where('payment_status', 'paid');
        $qs = (clone $query)
            ->select('item_id', DB::raw('COUNT(item_id) as count'))
            ->groupBy('item_id');

        $this->data = $qs->limit(10)->get()->sortByDesc('count');
        $total = (clone $query)->count('item_id');
        // dd($total);
        $this->data->transform(function ($qs) use ($total) {
            $percentange = ($qs->count / $total) * 100;
            $qs->percentage = $percentange;
            $qs->item = Item::find($qs->item_id);
            return $qs;
        });

        // dd($this->data);
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.best-selling-items');
    }
}
