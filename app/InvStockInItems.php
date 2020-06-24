<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvStockInItems extends Model
{
    //
    protected $fillable = [
        'id',
        'inv_stock_ins_id',
        'inv_items_id',
        'inv_units_id',
        'qty',
        'price',
        'created_at',
        'updated_at'
    ];

    public function invitems()
    {
        return $this->belongsTo(InvItems::class, 'id', 'inv_items_id');
    }
}
