<?php

namespace App\Livewire\Pages\Admin\Items;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemList extends Component
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

    #[On('delete_category')]
    public function deleteItem($id)
    {
        $qs = Item::find($id);
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
        $dt = Item::with(['category'])->search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        $data = $dt->groupBy(function($qs) {
            return $qs->category->name;
        });
        $links = $dt;
        return view('livewire.pages.admin.items.item-list', compact('data', 'links'));
    }
}
