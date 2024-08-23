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
        'discount_id',
    ];

    public function images()
    {
        return $this->hasMany(Gallery::class);
    }

    public function category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(ItemReview::class);
    }

    public function scopeSearch($qs, $keyword)
    {
        $qs->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('slug', 'like', '%' . $keyword . '%')
            ->orWhere('status', 'like', '%' . $keyword . '%')
            ->orWhere('short_description', 'like', '%' . $keyword . '%')
            ->orWhereHas('category', function ($qs) use ($keyword) {
                $qs->where('name', 'like', '%' . $keyword . '%');
            });
    }

    public function scopePublicSearch($qs, $keyword)
    {
        $qs->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('slug', 'like', '%' . $keyword . '%')
            ->orWhere('short_description', 'like', '%' . $keyword . '%')
            ->orWhereHas('category', function ($qs) use ($keyword) {
                $qs->where('name', 'like', '%' . $keyword . '%')
                    ->orWhereHas('category', function ($qs) use ($keyword) {
                        $qs->where('name', 'like', '%' . $keyword . '%')
                            ->orWhereHas('main_category', function ($qs) use ($keyword) {
                                $qs->where('name', 'like', '%' . $keyword . '%');
                            });
                    });
            });
    }

    protected $appends = ['amount'];

    public function getAmountAttribute() {
        if($this->discount) {
            $amount = $this->price - ($this->price * $this->discount->percentage) / 100;

            return $amount;
        }
    }
}
