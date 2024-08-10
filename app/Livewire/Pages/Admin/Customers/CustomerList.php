<?php

namespace App\Livewire\Pages\Admin\Customers;

use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerList extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 50;
    public $sortBy = 'created_at';
    public $sortDir = 'DESC';


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getData() {
        $data = Customer::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);

        return $data;
    }

    #[On('delete_customer')]
    public function deleteCustomer($id)
    {
        $qs = Customer::find($id);
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

    public function render()
    {
        $data = $this->getData();
        
        return view('livewire.pages.admin.customers.customer-list', compact('data'));
    }
}
