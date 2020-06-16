<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvVendors extends Model
{
    //

    public function InvStatuses()
    {
        return $this->belongsTo(InvStatuses::class);
    }
}
