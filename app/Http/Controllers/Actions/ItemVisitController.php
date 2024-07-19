<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Jobs\StoreItemVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ItemVisitController extends Controller
{
    public function recordVisit($itemId, $userId)
    {
        $ipAddress = request()->ip();
        $userAgent = request()->header('User-Agent');
        $referrer = request()->header('referer');
        $session_id = $this->getSessionId();

        StoreItemVisit::dispatch($itemId, $ipAddress, $userAgent, $referrer, $userId, $session_id);
    }

    public function getSessionId()
    {
        $sessionId = Cookie::get('cart_session_id');

        if (!$sessionId) {
            $sessionId = Str::uuid()->toString();
            Cookie::queue('cart_session_id', $sessionId, 60 * 24 * 90); // 90 days
        }

        return $sessionId;
    }
}
