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
}
