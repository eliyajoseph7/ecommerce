<?php

namespace App\Livewire\Pages\Admin\Categories;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
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
    public function deleteCategory($id)
    {
        $qs = Category::find($id);
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
        $dt = Category::with(['main_category'])->search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        $data = $dt->groupBy(function($qs) {
            return $qs->main_category->name;
        });
        $links = $dt;
        return view('livewire.pages.admin.categories.category-list', compact('data', 'links'));
    }
}
