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
        'employee_id',
        'diagnosa',
        'doctor_id',
        'subtotal',
        'surcharge',
        'discount',
        'total'
    ];

    public function client()
    {
        return $this->hasOne(Mstclient::class, 'id', 'client_id');
    }

    public function employee()
    {
        return $this->hasOne(Mstclientemployee::class, 'id', 'employee_id');
    }
    
}
