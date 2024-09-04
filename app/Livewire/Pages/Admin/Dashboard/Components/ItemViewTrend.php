<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components;

use App\Models\Item;
use Livewire\Component;

class ItemViewTrend extends Component
{
    public $data;
    public $date;
    public $type = 'chart';

    public function mount() {
        $this->date = now()->format('Y-m-d');
        $this->display();
    }

    public function display() {
        if($this->type == 'chart') {
            $this->getChartData();
        } else {
            $this->getData();
        }
    }

    public function updatedType() {
        $this->display();
        $this->render();
    }

    public function getData() {
        $query = Item::query()->orderByDesc('clicks');
        $this->data = $query->limit(10)->get();
        $total = Item::sum('clicks');
        // dd($total);
        $this->data->transform(function($qs) use($total) {
            $percentange = ($qs->clicks / $total) * 100;
            $qs->percentage = $percentange;
            return $qs;
        });
    }
    
    public function getChartData() {
        $query = Item::query()->orderByDesc('clicks')->limit(10);
        $categories = $query->pluck('name');
        $data = (clone $query)->pluck('clicks');

        $series[] = [
            'name' => 'Views',
            'data' => $data
        ];
        $result = [$categories, $series];
        $this->dispatch('redraw_view_trend_chart', result: $result);
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.item-view-trend');
    }
}
