<?php

namespace App\Livewire\Pages\Admin\Discounts;

use App\Models\Discount;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class DiscountList extends Component
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
        $data = Discount::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);

        return $data;
    }

    #[On('delete_discount')]
    public function deleteDiscount($id)
    {
        $qs = Discount::find($id);
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
        
        return view('livewire.pages.admin.discounts.discount-list', compact('data'));
    }
}
