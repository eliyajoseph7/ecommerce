<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class UpdateItemDiscountController extends Controller
{
    public function updateDiscount() {
        $items = Item::whereNotNull('discount_id')->with('discount')->get();
        foreach($items as $item) {
            if($item->discount->end_date) {
                if($item->discount->end_date < now()) {
                    $item->discount_id = null;
                    $item->save();
                }
            }
        }
    }
}
