<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorShop extends Model
{

    use HasFactory;
    protected $table = 'vendor_shops';
    protected $fillable = ['vendor_id', 'shop_name', 'shop_id','shop_owner_name','is_active','shop_level','expiration_date'];
}
