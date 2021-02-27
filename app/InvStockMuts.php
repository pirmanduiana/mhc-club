<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvStockMuts extends Model
{
    //

    public function invstockmutitems()
    {
        return $this->hasMany(InvStockMutItems::class);
    }

    public function fromWarehouse()
    {
        return $this->belongsTo(InvWarehouses::class, 'inv_warehouses_id_from', 'id');
    }

    public function toWarehouse()
    {
        return $this->belongsTo(InvWarehouses::class, 'inv_warehouses_id_to', 'id');
    }

    public function InvTransactions()
    {
        return $this->hasMany(InvTransactions::class, 'code', 'code');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($model)
        {
            $model->InvTransactions()->delete();
        });
    }
}
