<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnbillingitem extends Model
{
    //
    protected $table = "trn_billing_item";
    protected $fillable = [
        'billing_id',
        'item_id',
        'price',
        'qty',
        'total'
    ];
}
