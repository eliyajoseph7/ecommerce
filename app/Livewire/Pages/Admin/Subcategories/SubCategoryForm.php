<?php

namespace App\Livewire\Pages\Admin\Subcategories;

use App\Models\Category;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Livewire\Component;

class SubCategoryForm extends Component
{
    public $action = 'add';
    public $id;

    public $menus = [];
    public $sub_categories = [];
    public $categories = [];

    protected $rules = [
        'sub_categories.*.name' => 'required|string|max:255',
        'sub_categories.*.slug' => 'nullable',
        'sub_categories.*.category_id' => 'required',
        'sub_categories.*.status' => 'required',
    ];

    protected $messages =
    [
        'sub_categories.*.*.required' => 'This field is required'
    ];

    public function mount($subCategoryId = null)
    {
        if ($subCategoryId) {
            $this->action = 'update';
            $this->id = $subCategoryId;
            // action is editing
            // Load existing category data
            $subcategory = SubCategory::find($subCategoryId);
            $this->sub_categories[] = [
                'id' => $subcategory->id,
                'name' => $subcategory->name,
                'slug' => $subcategory->slug,
                'status' => $subcategory->status,
                'category_id' => $subcategory->category_id,
            ];
        } else {
            $this->addSubCategory();
        }

        $this->menus = MainCategory::where('status', 'active')->orderBy('rank')->get();
    }

    public function addSubCategory()
    {
        // $this->validate();
        $this->sub_categories[] = [
            'name' => '',
            'slug' => '',
            'category_id' => '',
            'status' => 'active',
        ];

    }

    public function removeSubCategory($index)
    {
        unset($this->sub_categories[$index]);
        $this->sub_categories = array_values($this->sub_categories);
    }


    public function generateSlug($name)
    {
        $slug = strtolower(str_replace(' ', '-', $name));
        return $slug;
    }

    public function updatedSubCategories($value, $name)
    {
        [$index, $field] = explode('.', $name);

        if ($field === 'main_category_id') {
            $this->categories[$index] = Category::where('main_category_id', $value)->get();
            $this->sub_categories[$index]['category_id'] = null;
        }

    }

    public function submit()
    {
        $this->validate();

        foreach ($this->sub_categories as $categoryData) {
            SubCategory::updateOrCreate(['id' => $categoryData['id'] ?? null], [
                'name' => $categoryData['name'],
                'slug' => $this->generateSlug($categoryData['name']),
                'category_id' => $categoryData['category_id'],
                'status' => $categoryData['status']
            ]);
        }

        session()->flash('info', [
            'type' => 'success',
            'message' => $this->action == 'add' ? 'Sub-Category successfully created.' : 'Sub-Category successfully updated.',
        ]);

        return redirect()->route('sub_category_list');
    }


    public function render()
    {
        return view('livewire.pages.admin.subcategories.sub-category-form');
    }
}
