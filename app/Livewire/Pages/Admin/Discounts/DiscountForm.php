<?php

namespace App\Livewire\Pages\Admin\Discounts;

use App\Models\Discount;
use Livewire\Component;

class DiscountForm extends Component
{
    public $discounts = [];

    public $action = 'add';
    public $id;

    protected $rules = [
        'discounts.*.name' => 'required|string|max:255',
        'discounts.*.description' => 'required|string',
        'discounts.*.percentage' => 'required|numeric',
        'discounts.*.start_date' => 'required',
        // 'discounts.*.end_date' => 'required',
    ];

    protected $messages =
    [
        'discounts.*.*.required' => 'This field is required'
    ];

    public function mount($discountId = null)
    {
        if ($discountId) {
            $this->action = 'update';
            $this->id = $discountId;
            // action is editing
            // Load existing discount data
            $discount = Discount::find($discountId);
            $this->discounts[] = [
                'id' => $discount->id,
                'name' => $discount->name,
                'description' => $discount->description,
                'percentage' => $discount->percentage,
                'start_date' => $discount->start_date->format('Y-m-d'),
                'end_date' => $discount->end_date?->format('Y-m-d'),
            ];
        } else {
            $this->addDiscount();
        }
    }

    public function addDiscount()
    {
        // $this->validate();
        $this->discounts[] = [
            'name' => '',
            'description' => '',
            'percentage' => '',
            'start_date' => '',
            'end_date' => '',
        ];

        $this->dispatch('reinitialize_tinymce');
    }

    public function removeDiscount($index)
    {
        unset($this->discounts[$index]);
        $this->discounts = array_values($this->discounts);
    }


    public function submit()
    {
        $this->validate();

        foreach ($this->discounts as $discountData) {
            // Update existing discount or create new discount
            $discount = Discount::updateOrCreate(['id' => $discountData['id'] ?? null], [
                'name' => $discountData['name'],
                'description' => $discountData['description'],
                'percentage' => $discountData['percentage'],
                'start_date' => $discountData['start_date'],
                'end_date' => $discountData['end_date'],
            ]);
        }

        session()->flash('info', [
            'type' => 'success',
            'message' => $this->action == 'add' ? 'Discounts successfully created.' : 'Discounts successfully updated.',
        ]);

        return redirect()->route('discount_list');
    }
    public function render()
    {
        return view('livewire.pages.admin.discounts.discount-form');
    }
}
