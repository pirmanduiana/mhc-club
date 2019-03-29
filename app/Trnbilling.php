<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnbilling extends Model
{
    //
    protected $table = "trn_billing";
    protected $fillable = [
        'code',
        'date',
        'client_id',
        'mhc_code',
        'provider_id',
        'diagnosa',
        'doctor_id',
        'subtotal',
        'surcharge',
        'discount',
        'total'
    ];

    public function provider()
    {
        return $this->hasOne(Mstprovider::class, 'id', 'provider_id');
    }

    public function client()
    {
        return $this->hasOne(Mstclient::class, 'id', 'client_id');
    }

    public function employee()
    {
        return $this->hasOne(Viewpasienactive::class, 'mhc_code', 'mhc_code');
    }
    
}
