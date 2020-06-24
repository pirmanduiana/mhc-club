<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvStockOuts extends Model
{
    //

    public function invstockoutitems()
    {
        return $this->hasMany(InvStockOutItems::class);
    }

    public function InvVendors()
    {
        return $this->belongsTo(InvVendors::class);
    }

    public function InvWarehouses()
    {
        return $this->belongsTo(InvWarehouses::class);
    }
}