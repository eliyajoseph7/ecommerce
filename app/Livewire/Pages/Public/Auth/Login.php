<?php

namespace App\Livewire\Pages\Public\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\CustomerSessionController;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\ItemVisit;
use App\Models\Order;
use App\Models\WishList;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('livewire.pages.public.layouts.base')]
class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $customer = Customer::where('email', $this->email);
        if ($customer->exists()) {
            $customer = $customer->first();
            $validCustomerPasswordCredentials = Hash::check($this->password, $customer->getAuthPassword());

            if ($validCustomerPasswordCredentials) {
                $sessionId = (new CustomerSessionController)->getSessionId();

                $newSessionId = Str::uuid()->toString();
                Cookie::queue(Cookie::make('cart_session_id', $newSessionId, 60 * 24 * 90)); // 90 days

                // update session id in cart and visit tables
                Cart::where('session_id', $sessionId)->update([
                    'session_id' => $newSessionId,
                    'customer_id' => $customer->id
                ]);

                ItemVisit::where('session_id', $sessionId)->update([
                    'session_id' => $newSessionId,
                    'customer_id' => $customer->id
                ]);

                WishList::where('session_id', $sessionId)->update([
                    'customer_id' => $customer->id,
                    'session_id' => $newSessionId
                ]);
                
                Order::where('session_id', $sessionId)->update([
                    'session_id' => $newSessionId,
                    'customer_id' => $customer->id
                ]);

                $customer->session_id = $newSessionId;
                $customer->loggedin = '1';
                $customer->last_login = now();
                $customer->save();

                return redirect()->to('/'.'#items');
            }
        }
        session()->flash('status', 'Incorrect credentials entered!');
    }

    public function mount() {
        if(Helper::is_auth()) {
            return redirect()->to('/'.'#items');
        }
    }
    public function render()
    {
        return view('livewire.pages.public.auth.login');
    }


}
