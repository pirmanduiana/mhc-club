<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvStockIns extends Model
{
    //

    public function invstockinitems()
    {
        return $this->hasMany(InvStockInItems::class);
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