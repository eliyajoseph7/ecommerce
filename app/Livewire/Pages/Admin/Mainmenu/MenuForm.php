<?php

namespace App\Livewire\Pages\Admin\Mainmenu;

use App\Models\MainCategory;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MenuForm extends Component
{
    public $action = 'add';
    public $id;

    public $menus = [];

    protected $rules = [
        'menus.*.name' => 'required|string|max:255',
        'menus.*.slug' => 'nullable',
        'menus.*.rank' => 'required',
        'menus.*.status' => 'required',
    ];

    protected $messages =
    [
        'menus.*.*.required' => 'This field is required'
    ];

    public function mount($menuId = null)
    {
        if ($menuId) {
            $this->action = 'update';
            $this->id = $menuId;
            // action is editing
            // Load existing menu data
            $menu = MainCategory::find($menuId);
            $this->menus[] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'slug' => $menu->slug,
                'status' => $menu->status,
                'rank' => $menu->rank,
            ];
        } else {
            $this->addMainCategory();
        }
    }

    public function addMainCategory()
    {
        // $this->validate();
        $this->menus[] = [
            'name' => '',
            'slug' => '',
            'rank' => '',
            'status' => 'active',
        ];

    }

    public function removeMainCategory($index)
    {
        unset($this->menus[$index]);
        $this->menus = array_values($this->menus);
    }


    public function generateSlug($name)
    {
        $slug = strtolower(str_replace(' ', '-', $name));
        return $slug;
    }

    public function rerank($rank)
    {
        if($this->id) {
            MainCategory::where('rank', $rank)->where('id', '!=', $this->id)->increment('rank');
        } else {
            MainCategory::where('rank', $rank)?->increment('rank');
        }
        $menu = MainCategory::where('rank', '>', $rank);
        if($menu->exists()) {
            $val = 1;
            foreach($menu->get() as $mn) {
                $mn->rank = $rank + $val;
                $mn->save();
                $val++;
            }
        }
    }


    public function submit()
    {
        $this->validate();

        foreach ($this->menus as $menuData) {
            $this->rerank($menuData['rank']);
            MainCategory::updateOrCreate(['id' => $menuData['id'] ?? null], [
                'name' => $menuData['name'],
                'slug' => $this->generateSlug($menuData['name']),
                'rank' => $menuData['rank'],
                'status' => $menuData['status']
            ]);
        }

        session()->flash('info', [
            'type' => 'success',
            'message' => $this->action == 'add' ? 'Menu successfully created.' : 'Menu successfully updated.',
        ]);

        return redirect()->route('main_menu_list');
    }

    #[On('delete_menu')]
    public function deleteMenu($menuId)
    {
        MainCategory::find($menuId)->delete();
        $this->dispatch('success', 'Menu deleted');
    }


    public function render()
    {
        return view('livewire.pages.admin.mainmenu.menu-form');
    }
}
