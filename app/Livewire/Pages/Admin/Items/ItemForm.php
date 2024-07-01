<?php

namespace App\Livewire\Pages\Admin\Items;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Item;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ItemForm extends Component
{
    use WithFileUploads;

    public $items = [];
    public $mainCategories = [];
    public $categories = [];
    public $subCategories = [];

    protected $rules = [
        'items.*.name' => 'required|string|max:255',
        'items.*.slug' => 'required|string|max:255',
        'items.*.short_description' => 'required|string|max:255',
        'items.*.description' => 'required|string',
        'items.*.price' => 'required|numeric',
        'items.*.main_category_id' => 'nullable|exists:main_categories,id',
        'items.*.category_id' => 'nullable|exists:categories,id',
        'items.*.sub_category_id' => 'required|exists:sub_categories,id',
        'items.*.images.*' => 'required|image|max:1024', // 1MB Max
    ];

    public function mount()
    {
        $this->mainCategories = MainCategory::all();
        $this->addItem();
    }

    public function addItem()
    {
        $this->validate();
        $this->items[] = [
            'name' => '',
            'slug' => '',
            'short_description' => '',
            'description' => '',
            'price' => '',
            'main_category_id' => '',
            'category_id' => '',
            'sub_category_id' => '',
            'images' => [],
        ];
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    
    public function generateSlug($name) {
        $slug = strtolower(str_replace(' ', '-', $name));
        return $slug;
    }

    public function updatedItems($value, $name)
    {
        [$index, $field] = explode('.', $name);
        // dd();

        if ($field === 'main_category_id') {
            $this->categories[$index] = Category::where('main_category_id', $value)->get();
            $this->items[$index]['category_id'] = null;
            $this->subCategories[$index] = [];
            $this->items[$index]['sub_category_id'] = null;
        }

        if ($field === 'category_id') {
            $this->subCategories[$index] = SubCategory::where('category_id', $value)->get();
            $this->items[$index]['sub_category_id'] = null;
        }
    }

    public function submit()
    {
        $this->validate();

        foreach ($this->items as $itemData) {
            $item = Item::create([
                'name' => $itemData['name'],
                'slug' => $this->generateSlug($itemData['name']),
                'short_description' => $itemData['short_description'],
                'description' => $itemData['description'],
                'price' => $itemData['price'],
                'sub_category_id' => $itemData['sub_category_id'],
            ]);

            foreach ($itemData['images'] as $image) {
                $fileNameToSave = null;
                $this->file = (object)$image;
                try {
                    $file = $this->file->getClientOriginalName();
                    $extension = $this->file->getClientOriginalExtension();
                    $fileName = pathinfo($file, PATHINFO_FILENAME) . "-" . date('Ymd-His') . "." . $extension;
                    $this->file->storeAs('itemImages', $fileName, 'public');
    
                    $fileNameToSave = '/storage/itemImages/' . $fileName;
                } catch (\Throwable $e) {
                }
                Gallery::create([
                    'item_id' => $item->id,
                    'image' => $fileNameToSave,
                ]);
            }
        }

        session()->flash('message', [
            'type' => 'success',
            'message' => 'Items successfully created.',
        ]);

        return redirect()->route('item_list');
    }


    public function render()
    {
        return view('livewire.pages.admin.items.item-form');
    }
}
