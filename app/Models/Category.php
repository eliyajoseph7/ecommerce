<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'main_category_id',
        'status'
    ];

    public function sub_categories() {
        return $this->hasMany(SubCategory::class);
    }

    public function main_category() {
        return $this->belongsTo(MainCategory::class);
    }

    public function scopeSearch($qs, $keyword)
    {
        $qs->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('slug', 'like', '%' . $keyword . '%')
        ->orWhere('status', 'like', '%' . $keyword . '%')
        ->orWhereHas('main_category', function($qs) use($keyword) {
            $qs->where('name', 'like', '%' . $keyword . '%');
        });
    }
}
