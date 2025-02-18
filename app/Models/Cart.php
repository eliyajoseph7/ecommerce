<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'item_id',
        'quantity'
    ];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    protected $appends = ['cost'];

    public function getCostAttribute() {
        $cost = $this->quantity * ($this->item->discount ? $this->item->amount : $this->item->price);

        return $cost;
    }
}
