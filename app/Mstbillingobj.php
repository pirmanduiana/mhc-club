<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstbillingobj extends Model
{
    //
    protected $table = "mst_billing_obj";
    protected $fillable = [
        'name', 'multiplier'
    ];
}
