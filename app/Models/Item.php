<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function images() {
        return $this->hasMany(Gallery::class, 'item_images');
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
