<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'sub_category_id',
    ];

    public function images() {
        return $this->hasMany(Gallery::class, 'item_images');
    }

    public function category() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function scopeSearch($qs, $keyword)
    {
        $qs->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('slug', 'like', '%' . $keyword . '%')
        ->orWhere('status', 'like', '%' . $keyword . '%')
        ->orWhere('short_description', 'like', '%' . $keyword . '%')
        ->orWhereHas('category', function($qs) use($keyword) {
            $qs->where('name', 'like', '%' . $keyword . '%');
        });
    }
}
