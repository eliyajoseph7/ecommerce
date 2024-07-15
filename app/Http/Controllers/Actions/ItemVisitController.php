<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Jobs\StoreItemVisit;
use Illuminate\Http\Request;

class ItemVisitController extends Controller
{
    public function recordVisit($itemId, $userId)
    {
        $ipAddress = request()->ip();
        $userAgent = request()->header('User-Agent');
        $referrer = request()->header('referer');

        StoreItemVisit::dispatch($itemId, $ipAddress, $userAgent, $referrer, $userId);
    }
}
