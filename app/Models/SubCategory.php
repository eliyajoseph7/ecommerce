<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($qs, $keyword)
    {
        $qs->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('slug', 'like', '%' . $keyword . '%')
        ->orWhere('status', 'like', '%' . $keyword . '%')
        ->orWhereHas('category', function($qs) use($keyword) {
            $qs->where('name', 'like', '%' . $keyword . '%');
        });
    }
}
