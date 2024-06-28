<?php

namespace App\Livewire\Pages\Admin\Mainmenu;

use App\Models\MainCategory;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class MenuList extends Component
{
    use WithPagination;
    public $search = '';
    public $perPage = 50;
    public $sortBy = 'rank';
    public $sortDir = 'ASC';



    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[On('delete_main_category')]
    public function deleteMainCategory($id)
    {
        $qs = MainCategory::find($id);
        $qs->delete();

        $this->dispatch('show_success', 'Record deleted successfully');
    }

    public function getData() {
        $data = MainCategory::search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);

        return $data;
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
        return view('livewire.pages.admin.mainmenu.menu-list', compact('data'));
    }
}
