<?php

namespace App\Livewire\Pages\Admin\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

// #[Layout('livewire.layouts.admin.app')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.dashboard.dashboard');
    }
}
