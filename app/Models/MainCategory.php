<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'rank',
        'status'
    ];

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function scopeSearch($qs, $keyword)
    {
        return $qs->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('slug', 'like', '%' . $keyword . '%');
    }
}
