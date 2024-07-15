<?php

namespace App\Livewire\Pages\Admin\Categories;

use App\Models\Category;
use App\Models\MainCategory;
use Livewire\Component;

class CategoryForm extends Component
{
    public $action = 'add';
    public $id;

    public $menus = [];
    public $categories = [];

    protected $rules = [
        'categories.*.name' => 'required|string|max:255',
        'categories.*.slug' => 'nullable',
        'categories.*.main_category_id' => 'required',
        'categories.*.status' => 'required',
    ];

    protected $messages =
    [
        'categories.*.*.required' => 'This field is required'
    ];

    public function mount($categoryId = null)
    {
        if ($categoryId) {
            $this->action = 'update';
            $this->id = $categoryId;
            // action is editing
            // Load existing category data
            $category = Category::find($categoryId);
            $this->categories[] = [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
                'status' => $category->status,
                'main_category_id' => $category->main_category_id,
            ];
        } else {
            $this->addCategory();
        }

        $this->menus = MainCategory::where('status', 'active')->orderBy('rank')->get();
    }

    public function addCategory()
    {
        // $this->validate();
        $this->categories[] = [
            'name' => '',
            'slug' => '',
            'main_category_id' => '',
            'status' => 'active',
        ];

    }

    public function removeCategory($index)
    {
        unset($this->categories[$index]);
        $this->categories = array_values($this->categories);
    }


    public function generateSlug($name)
    {
        $slug = strtolower(str_replace(' ', '-', $name));
        return $slug;
    }


    public function submit()
    {
        $this->validate();

        foreach ($this->categories as $categoryData) {
            Category::updateOrCreate(['id' => $categoryData['id'] ?? null], [
                'name' => $categoryData['name'],
                'slug' => $this->generateSlug($categoryData['name']),
                'main_category_id' => $categoryData['main_category_id'],
                'status' => $categoryData['status']
            ]);
        }

        session()->flash('info', [
            'type' => 'success',
            'message' => $this->action == 'add' ? 'Category successfully created.' : 'Category successfully updated.',
        ]);

        return redirect()->route('category_list');
    }

    #[On('delete_category')]
    public function deleteCategory($categoryId)
    {
        Category::find($categoryId)->delete();
        $this->dispatch('success', 'Category deleted');
    }


    public function render()
    {
        return view('livewire.pages.admin.categories.category-form');
    }
}
