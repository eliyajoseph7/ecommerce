<?php

namespace App\Livewire\Pages\Public\Auth;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $user = Customer::where('email', $this->email);
        if ($user->exists()) {
            $user = $user->first();
            $validCustomerPasswordCredentials = Hash::check($this->password, $user->getAuthPassword());

            if ($validCustomerPasswordCredentials) {
                return redirect()->route('home');
            }
        }
        session()->flash('status', 'Incorrect credentials entered!');
    }
    
    public function render()
    {
        return view('livewire.pages.public.auth.login');
    }
}
