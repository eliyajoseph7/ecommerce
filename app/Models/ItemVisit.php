<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'ip_address',
        'user_agent',
        'referrer',
        'user_id',
    ];
}
