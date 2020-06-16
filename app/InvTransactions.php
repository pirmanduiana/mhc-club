<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvTransactions extends Model
{
    //

    public function InvItems()
    {
        return $this->belongsTo(InvItems::class);
    }

    public function InvVendors()
    {
        return $this->belongsTo(InvVendors::class);
    }

    public function InvWarehouses()
    {
        return $this->belongsTo(InvWarehouses::class);
    }

    public function InvUnits()
    {
        return $this->belongsTo(InvUnits::class);
    }
}
