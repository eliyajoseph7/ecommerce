<?php

namespace App\Livewire\Pages\Public\Auth;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Profile extends Component
{
    public $current_password;
    public $new_password;

    public $redirecting = false;

    #[On('update_password')]
    public function changePassword() {
        if($this->current_password) {
            $customer = Customer::where('session_id', (new CustomerSessionController)->getSessionId())->first();
            $validCustomerPasswordCredentials = Hash::check($this->current_password, $customer->getAuthPassword());
            if(!$validCustomerPasswordCredentials) {
                $this->dispatch('errorToast', message: 'Current password is incorrect!');
            } else {
                $this->validate([
                    'new_password' => 'required|min:4'
                ]);
                $customer->update([
                    'password' => Hash::make($this->new_password)
                ]);
            }
        }
        $this->dispatch('successToast', message: 'Profile updated!');
        // $this->redirecting = true;
        // $this->dispatch('profile_updated');
    }

    #[On('to_home_screen')] 
    public function rediredtToHome() {
        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.pages.public.auth.profile');
    }
}
