<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'percentage', 'start_date', 'end_date'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function scopeSearch($qs, $keyword)
    {
        return $qs->where('name', 'like', '%' . $keyword . '%')
        ->orWhere('description', 'like', '%' . $keyword . '%')
        ->orWhere('percentage', 'like', '%' . $keyword . '%')
        ->orWhere('start_date', 'like', '%' . $keyword . '%')
        ->orWhere('end_date', 'like', '%' . $keyword . '%')
        ->orWhere('created_at', 'like', '%' . $keyword . '%');
    }

    protected $appends = ['info'];

    public function getInfoAttribute() {
        return $this->percentage . '% ('. $this->start_date?->format('M d, Y') . ' - ' . $this->end_date?->format('M d, Y') . ')';
    }
}
