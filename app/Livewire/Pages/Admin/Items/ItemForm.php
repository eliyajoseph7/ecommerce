<?php

namespace App\Livewire\Pages\Admin\Items;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Gallery;
use App\Models\Item;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ItemForm extends Component
{
    use WithFileUploads;

    public $items = [];
    public $mainCategories = [];
    public $categories = [];
    public $subCategories = [];

    public $action = 'add';
    public $id;

    protected $rules = [
        'items.*.name' => 'required|string|max:255',
        'items.*.slug' => 'nullable|string|max:255',
        'items.*.short_description' => 'required|string|max:255',
        'items.*.description' => 'required|string',
        'items.*.price' => 'required|numeric',
        'items.*.main_category_id' => 'nullable|exists:main_categories,id',
        'items.*.category_id' => 'nullable|exists:categories,id',
        'items.*.sub_category_id' => 'required|exists:sub_categories,id',
        'items.*.discount_id' => 'exclude',
        'items.*.status' => 'exclude',
    ];

    protected $messages =
    [
        'items.*.*.required' => 'This field is required'
    ];

    public function mount($itemId = null)
    {
        $this->mainCategories = MainCategory::all();
        if ($itemId) {
            $this->action = 'update';
            $this->id = $itemId;
            // action is editing
            // Load existing item data
            $item = Item::with('images')->find($itemId);
            $this->categories[0] = Category::where('main_category_id', $item->category?->category?->main_category_id)->get();
            $this->subCategories[0] = SubCategory::where('category_id', $item->category?->category_id)->get();
            $this->items[] = [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'short_description' => $item->short_description,
                'description' => $item->description,
                'price' => $item->price,
                'main_category_id' => $item->category->category->main_category_id ?? null,
                'category_id' => $item->category->category_id ?? null,
                'sub_category_id' => $item->sub_category_id,
                'discount_id' => $item->discount_id,
                'discount_id' => $item->discount_id,
                'status' => $item->status,
                'images' => [],
                'existing_images' => $item->images->pluck('image')->toArray(),
            ];
            // dd($item->category->category);
            $this->dispatch('set_description', $item->description);
        } else {
            $this->addItem();
        }
    }

    public function addItem()
    {
        // $this->validate();
        $this->items[] = [
            'name' => '',
            'slug' => '',
            'short_description' => '',
            'description' => '',
            'price' => '',
            'main_category_id' => '',
            'category_id' => '',
            'sub_category_id' => '',
            'discount_id' => '',
            'status' => '',
            'images' => [],
        ];

        $this->dispatch('reinitialize_tinymce');
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }


    public function generateSlug($name)
    {
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
        if ($this->action == 'add') {
            $this->validate([
                'items.*.images' => 'required',
                // 'items.*.images.*' => 'image',
            ]);
        } else {
            $this->validate([
                'items.*.images' => 'nullable',
                // 'items.*.images.*' => 'image',
            ]);
        }

        foreach ($this->items as $itemData) {
            // Update existing item if ID is provided
            // if (isset($itemData['id'])) {
            //     $item = Item::find($itemData['id']);
            //     $item->update([
            //         'name' => $itemData['name'],
            //         'slug' => $this->generateSlug($itemData['name']),
            //         'short_description' => $itemData['short_description'],
            //         'description' => $itemData['description'],
            //         'price' => $itemData['price'],
            //         'sub_category_id' => $itemData['sub_category_id'],
            //     ]);

            //     // // Handle existing images (edit or delete)
            //     // foreach ($item->images as $image) {
            //     //     // Delete images not in current list
            //     //     if (!in_array($image->image, $itemData['existing_images'])) {
            //     //         // Implement deletion logic as per your requirements
            //     //         $image->delete();
            //     //     }
            //     // }
            // } else {
            //     $item = Item::create([
            //         'name' => $itemData['name'],
            //         'slug' => $this->generateSlug($itemData['name']),
            //         'short_description' => $itemData['short_description'],
            //         'description' => $itemData['description'],
            //         'price' => $itemData['price'],
            //         'sub_category_id' => $itemData['sub_category_id'],
            //     ]);
            // }

            // dd($itemData['description']);
            // Update existing item or create new item
            $item = Item::updateOrCreate(['id' => $itemData['id'] ?? null], [
                'name' => $itemData['name'],
                'slug' => $this->generateSlug($itemData['name']),
                'short_description' => $itemData['short_description'],
                'description' => $itemData['description'], // Ensure this contains HTML from TinyMCE
                'price' => $itemData['price'],
                'sub_category_id' => $itemData['sub_category_id'],
                'discount_id' => $itemData['discount_id'],
                'discount_id' => $itemData['discount_id'],
                'status' => $itemData['status'],
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

        session()->flash('info', [
            'type' => 'success',
            'message' => $this->action == 'add' ? 'Items successfully created.' : 'Items successfully updated.',
        ]);

        return redirect()->route('item_list');
    }

    #[On('delete_image')]
    public function deleteImage($image)
    {
        $item = Item::find($this->id);
        // dd($image['image']);
        $imgname = str_replace(substr($image['image'], 0, 9), '', $image['image']);
        Gallery::where('item_id', $this->id)->where('image', $image['image'])->first()?->delete();
        // dd($imgname);
        $check = Storage::disk('public')->exists($imgname);
        if ($check) {
            Storage::disk('public')->delete($imgname);
        }

        $this->dispatch('success', 'image deleted');
        $this->items[0]['existing_images'] = $item->images->pluck('image')->toArray();
    }


    public function render()
    {
        $discounts = Discount::whereNull('end_date')->orWhereDate('end_date', '>=', today())->get();
        $statuses = Item::$statuses;
        return view('livewire.pages.admin.items.item-form', compact('discounts', 'statuses'));
    }
}
