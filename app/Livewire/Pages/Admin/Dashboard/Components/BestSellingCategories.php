<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components;

use App\Models\Order;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BestSellingCategories extends Component
{
    public $data;
    public $date;
    public $loading = true;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->getData();
    }

    public function getData()
    {
        $this->loading = true;
        $query = Order::query()->join('order_items', 'order_items.order_id', 'orders.id')
            ->join('items', 'items.id', 'order_items.item_id')->where('payment_status', 'paid');
        $qs = (clone $query)
            ->select('sub_category_id', DB::raw('SUM(order_items.price) as price'))
            ->groupBy('sub_category_id');

        $this->data = $qs->limit(5)->get()->sortByDesc('price');
        $this->data->transform(function ($qs) {
            $qs->category = SubCategory::find($qs->sub_category_id);
            return $qs;
        });

        $data = [];
        foreach ($this->data as $dt) {
            $data[] = [
                'name' => $dt->category->name,
                'y' => doubleval($dt->price)
            ];
        }

        $series[] = [
            'name' => 'Sale',
            'colorByPoint' => true,
            'innerSize' => '50%',
            'data' => $data
        ];

        $this->dispatch('draw_selling_category_chart', series: $series);
        // dump($series);

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.best-selling-categories');
    }
}
