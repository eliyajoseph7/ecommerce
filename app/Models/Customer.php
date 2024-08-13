<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'company',
        'tin',
        'session_id',
        'subscribed',
    ];

    protected $hidden = [
        'password',
    ];

    public function billingAddress() {
        return $this->hasOne(BillingAddress::class);
    }

    protected $appends = ['full_name', 'is_loggedin'];

    public function getFullnameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getIsLoggedinAttribute() {
        if($this->loggedin === '0') {
            return false;
        }
        return true;
    }

    public function scopeSearch($qs, $keyword)
    {
        return $qs->where('first_name', 'like', '%' . $keyword . '%')
        ->orWhere('last_name', 'like', '%' . $keyword . '%')
        ->orWhere('phone', 'like', '%' . $keyword . '%')
        ->orWhere('email', 'like', '%' . $keyword . '%')
        ->orWhere('company', 'like', '%' . $keyword . '%')
        ->orWhere('created_at', 'like', '%' . $keyword . '%')
        ->orWhere('tin', 'like', '%' . $keyword . '%');
    }
}
