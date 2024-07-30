<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderno', 'customer_id', 'order_date', 'status', 'total_amount', 'delivery_address_id', 
        'billing_address_id', 'payment_method', 'note', 'session_id', 'payment_status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(DeliveryAddress::class, 'delivery_address_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(BillingAddress::class, 'billing_address_id');
    }
}
