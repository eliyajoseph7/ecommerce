<?php

namespace App\Livewire\Pages\Public\Home;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.public.home.home')->layout('livewire.pages.public.layouts.base');
    }
}
