<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvStockOutItems extends Model
{
    //
    protected $table = 'inv_stock_out_items';

    protected $fillable = [
        'id',
        'inv_stock_outs_id',
        'inv_items_id',
        'inv_units_id',
        'qty',
        'price'
    ];
}