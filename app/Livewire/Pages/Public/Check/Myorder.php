<?php

namespace App\Livewire\Pages\Public\Check;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Myorder extends Component
{
    public function render()
    {
        return view('livewire.pages.public.check.myorder');
    }
}
