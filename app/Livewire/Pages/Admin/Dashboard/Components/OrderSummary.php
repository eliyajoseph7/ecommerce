<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components;

use App\Models\Order;
use Livewire\Component;

class OrderSummary extends Component
{
    public $data;
    public $date;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->getData();
    }
    
    public function getData() {
        $query = Order::query();
        $categories = (clone $query)->distinct('status')->pluck('status');
        $result = [];
        foreach($categories as $key=>$category) {
            $y = (clone $query)->where('status', $category)->count();

            $result[] = [
                'name' => $category,
                'sliced' => $key == 0,
                'selected' => $key == 0,
                'y' => $y
            ];
        }

        $series = [
            'name' => 'Order Summary',
            'colorByPoint'=> true,
            'data' => $result
        ];

        $this->data = $series;
        $this->dispatch('redraw_order_chart', $series);
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.order-summary');
    }
}
