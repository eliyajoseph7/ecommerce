<?php

namespace App\Livewire\Pages\Admin\Dashboard\Components\Stats;

use App\Models\ItemVisit;
use Livewire\Component;

class SystemVisits extends Component
{
    public $total = 0;
    public $date;

    public function mount() {
        $this->date = now()->format('Y-m-d');
        $this->getTotal();
    }

    public function getTotal() {
        $this->total = ItemVisit::count('id');
    }

    public function render()
    {
        return view('livewire.pages.admin.dashboard.components.stats.system-visits');
    }
}
