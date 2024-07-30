<?php

namespace App\Livewire\Pages\Public\Check\Components;

use App\Models\Customer;
use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerNote extends Component
{
    public $subscribe = false;
    public $note;


    #[On('submited_order')]
    public function validityCheck() {
        $this->validate();
    }

    #[On('save_note')]
    public function save($order_id, $customer_id) {
        $order = Order::find($order_id);
        if($order) {
            $order->note = $this->note;
            $order->save();
        }

        $customer = Customer::find($customer_id);
        if($customer) {
            $customer->subscribed = $this->subscribe ? '1' : '0';
            $customer->save();
        }

        $this->dispatch('order_completed');
    }

    public function render()
    {
        return view('livewire.pages.public.check.components.customer-note');
    }
}
