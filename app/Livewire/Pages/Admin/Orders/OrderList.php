<?php

namespace App\Livewire\Pages\Admin\Orders;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 50;
    public $sortBy = 'orderno';
    public $sortDir = 'DESC';


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getData() {
        $data = Order::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);

        return $data;
    }

    #[On('delete_order')]
    public function deleteOrder($id)
    {
        $qs = Order::find($id);
        $qs->delete();

        $this->dispatch('success', 'Record deleted successfully');
    }

    public function sortColumn($name)
    {
        if ($this->sortBy == $name) {
            $this->sortDir = ($this->sortDir == 'ASC') ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $name;
        $this->sortDir = 'DESC';
    }

    #[On('reload_orders')]
    public function render()
    {
        $data = $this->getData();
        
        return view('livewire.pages.admin.orders.order-list', compact('data'));
    }
}
