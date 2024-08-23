<?php

namespace App\Livewire\Pages\Public\Check\Components;

use App\Http\Controllers\CustomerSessionController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PaymentInfo extends Component
{
    #[Validate('required', as: 'pay method')]
    public $paymethod = 'cash';

    public function updatedPaymethod()
    {
    }


    #[On('submit_order')]
    public function validityCheck()
    {
        $this->validate();
    }

    #[On('save_order')]
    public function save($customer_id, $delivery_address_id, $billing_address_id)
    {
        $sessionId = (new CustomerSessionController)->getSessionId();
        $cart = Cart::where('session_id', $sessionId)->with('item')->get();
        $totalAmount = $cart->sum('cost');
        $order = Order::create([
            'customer_id' => $customer_id,
            'order_date' => now(),
            'orderno' => $this->generateOrderNo(),
            'status' => 'pending',
            'total_amount' => $totalAmount,
            'delivery_address_id' => $delivery_address_id,
            'billing_address_id' => $billing_address_id,
            'payment_method' => $this->paymethod,
            'session_id' => $sessionId,
            'payment_status' => 'pending',
        ]);

        $items = [];
        foreach($cart as $ct) {
            $items[] = [
                'order_id' => $order->id,
                'item_id' => $ct->item->id,
                'quantity' => $ct->quantity,
                'price' => $ct->item->discount ? $ct->item->amount : $ct->item->price,
                'total' => $ct->cost,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('order_items')->insert($items);

        $this->dispatch('save_note', order_id: $order->id, customer_id: $customer_id);
    }

    public function render()
    {
        return view('livewire.pages.public.check.components.payment-info');
    }


    public function generateOrderNo($count = 1)
    {
        $orderno = str_pad($count, 4, '0', STR_PAD_LEFT); // Generates a random 4-digit number
        $orderno = 'ORDEJ-' . $orderno;

        $check = Order::where('orderno', $orderno);
        if ($check->exists()) {
            // Log::error($orderno);
            $count = $count + 1;
            return $this->generateOrderNo($count);
        }

        return $orderno;
    }
}
