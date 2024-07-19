<?php

namespace App\Livewire\Pages\Public\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.pages.public.auth.register');
    }
}
