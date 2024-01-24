<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['parent_category_id', 'category_name'];

    public function vendor()
    {
        return $this->belongsToMany(Vendor::class,'id', 'vendor_id');
    }
}
