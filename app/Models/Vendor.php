<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;
    protected $table = 'vendors';

    protected $guard = ['vendor'];

    protected $fillable = [
        'name', 'email','phone_number','bank_name','bank_account_number', 'password','status','category_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function claims(): hasMany
    {
        return $this->hasMany(VendorClaim::class,'vendor_id','id');
    }

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
