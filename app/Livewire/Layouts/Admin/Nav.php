<?php

namespace App\Livewire\Layouts\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Nav extends Component
{

    public function logout() {

        $user = User::find(auth()->user()->id);
        
        Auth::guard('web')->logout();

        Session::invalidate();
        Session::regenerateToken();

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.layouts.admin.nav');
    }
}
