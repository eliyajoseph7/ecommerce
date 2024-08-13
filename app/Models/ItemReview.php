<?php

namespace App\Models;

use App\Http\Controllers\CustomerSessionController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemReview extends Model
{
    use HasFactory;

    protected $appends = ['canedit'];

    public function getCaneditAttribute() {
        $sessionId = (new CustomerSessionController)->getSessionId();
        $diff = date_diff(now(), $this->created_at)->days;
        if($this->session_id == $sessionId && $diff < 1) {
            return true;
        } else {
            return false;
        }
    }
}
