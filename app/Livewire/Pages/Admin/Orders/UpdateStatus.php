<?php

namespace App\Livewire\Pages\Admin\Orders;

use App\Models\Order;
use Livewire\Attributes\Validate;
use LivewireUI\Modal\ModalComponent;

class UpdateStatus extends ModalComponent
{
    public $order;
    public $categories = ['Order', 'Payment'];
    public $orderStatuses = [
        'pending' => 'Pending',
        'processing' => 'Process',
        'completed' => 'Complete',
        'cancelled' => 'Cancel',
    ];
    public $paymentStatuses = [
        'pending' => 'Pending',
        'paid' => 'Paid',
        'failed' => 'Failed',
        'refunded' => 'Refunded',
    ];

    public $statuses = [];
    #[Validate('required')]
    public $status;
    #[Validate('required')]
    public $category;

    public function updatedCategory()
    {
        $this->status = $this->category == 'Order' ? $this->order->status : $this->order->payment_status;
        $this->statuses = $this->category == 'Order' ? $this->orderStatuses : $this->paymentStatuses;
    }

    public static function destroyOnClose(): bool
    {
        return true;
    }

    public function submit()
    {
        $this->validate();
        $this->order->update(
            [
                $this->category == 'Order' ? 'status' : 'payment_status' => $this->status
            ]
        );
        $this->dispatch('reload_orders');
        $this->dispatch('success', 'Status updated successfully');
        $this->closeModal();
    }

    public function mount($id)
    {
        $this->order = Order::find($id);
    }

    public function render()
    {
        return view('livewire.pages.admin.orders.update-status');
    }
}
