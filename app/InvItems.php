<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvItems extends Model
{
    //

    public function InvCategories()
    {
        return $this->belongsTo(InvCategories::class);
    }

    public function InvPrices()
    {
        return $this->belongsTo(InvPrices::class);
    }

    public function InvStatuses()
    {
        return $this->belongsTo(InvStatuses::class);
    }

    public function InvUnits()
    {
        return $this->belongsTo(InvUnits::class);
    }
}
