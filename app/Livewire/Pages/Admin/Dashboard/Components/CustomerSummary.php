<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CustomerSummary extends Component
{
    public $data;
    public $date;
    public $loading = false;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->getData();
    }

    public function getData()
    {
        $this->loading = true;
        $query = Order::selectRaw('
            SUM(CASE WHEN order_count > 1 THEN 1 ELSE 0 END) AS more_than_once,
            SUM(CASE WHEN order_count = 1 THEN 1 ELSE 0 END) AS one_time
        ')
            ->fromSub(function ($qs) {
                $qs->select('customer_id', DB::raw('COUNT(*) as order_count'))
                    ->from('orders')->groupBy('customer_id');
            }, 'subqs')->first();

        $result = [
            [
                'name' => 'New',
                'sliced' => true,
                'selected' => true,
                'y' => intval($query->one_time)
            ],
            [
                'name' => 'Returning',
                'y' => intval($query->more_than_once)
            ],
        ];
        $series = [
            'name' => 'Customers',
            'colorByPoint' => true,
            'data' => $result
        ];

        $this->data = $series;
        $this->dispatch('redraw_customer_chart', $series);
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.customer-summary');
    }
}
