<?php

namespace App\Livewire\Pages\Admin\Subcategories;

use App\Models\SubCategory;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategoryList extends Component
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

    #[On('delete_sub_category')]
    public function deleteSubCategory($id)
    {
        $qs = SubCategory::find($id);
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
        $dt = SubCategory::with(['category'])->search($this->search)->orderBy($this->sortBy, $this->sortDir)->paginate($this->perPage);
        $data = $dt->groupBy(function($qs) {
            return $qs->category->name;
        });
        $links = $dt;
        return view('livewire.pages.admin.subcategories.sub-category-list', compact('data', 'links'));
    }
}
