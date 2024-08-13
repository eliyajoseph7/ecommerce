<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'quantity', 'price', 'total', 'order_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected $appends = ['total_price'];

    public function getTotalPriceAttribute() {
        return $this->quantity * $this->price;
    }
}
