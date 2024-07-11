<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $fillable = [
        'session_id',
        'item_id',
    ];

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
