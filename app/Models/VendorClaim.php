<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorClaim extends Model
{
    protected $primaryKey = 'vendor_claim_id';
    protected $table = 'vendor_claims';
    protected $fillable = [
        'vendor_id', 'claim_amount', 'claim_status','updated_by',
    ];

    public function vendor()
    {
        return $this->belongsToMany(Vendor::class,'id', 'vendor_id');
    }
}
