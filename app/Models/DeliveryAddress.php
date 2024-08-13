<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'country_id',
        'region_id',
        'district_id',
        'ward_id',
        'village_id',
        'address',
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public function district() {
        return $this->belongsTo(District::class);
    }

    public function ward() {
        return $this->belongsTo(Ward::class);
    }
    
    public function village() {
        return $this->belongsTo(Village::class);
    }
    
}
