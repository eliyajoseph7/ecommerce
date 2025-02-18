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


    public function scopeSearch($qs, $keyword)
    {
        return $qs->where('orderno', 'like', '%' . $keyword . '%')
        ->orWhere('status', 'like', '%' . $keyword . '%')
        ->orWhere('payment_status', 'like', '%' . $keyword . '%')
        ->orWhere('payment_method', 'like', '%' . $keyword . '%')
        ->orWhere('order_date', 'like', '%' . $keyword . '%')
        ->orWhere('total_amount', 'like', '%' . $keyword . '%')
        ->orWhereHas('customer', function($qs) use($keyword) {
            $qs->where('first_name', 'like', '%' . $keyword . '%')
            ->orWhere('last_name', 'like', '%' . $keyword . '%');
        });
    }

    protected $casts = [
        'order_date' => 'date'
    ];

    protected $appends = ['order_status', 'order_payment'];

    public function getOrderStatusAttribute() {
        $status = $this->status;
        $html = '';
        if($status == 'pending') {
            $html = '<div class="text-sky-500 bg-sky-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        } else if($status == 'processing') {
            $html = '<div class="text-yellow-500 bg-yellow-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        } else if($status == 'completed') {
            $html = '<div class="text-green-500 bg-green-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        } else if($status == 'cancelled') {
            $html = '<div class="text-red-500 bg-red-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        } else if($status == 'refunded') {
            $html = '<div class="text-blue-500 bg-blue-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        }

        return $html;
    }

    public function getOrderPaymentAttribute() {
        $status = $this->payment_status;
        $html = '';
        if($status == 'pending') {
            $html = '<div class="text-red-500 bg-red-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        } else if($status == 'failed') {
            $html = '<div class="text-yellow-500 bg-yellow-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        } else if($status == 'paid') {
            $html = '<div class="text-green-500 bg-green-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        } else if($status == 'refunded') {
            $html = '<div class="text-blue-500 bg-blue-50 px-2 py-0 5 rounded-md font-bold">'. $status.'</div>';
        }

        return $html;
    }
}
