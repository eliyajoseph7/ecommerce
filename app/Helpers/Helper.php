<?php

namespace App\Helpers;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Customer;

class Helper
{

    public static function is_auth()
    {
        $sessionId = (new CustomerSessionController)->getSessionId();
        $customer = Customer::where('session_id', $sessionId);
        if ($customer->exists()) {
            if($customer->first()->loggedin == '1') {
                return true;
            }
        } return false;
    }

}
