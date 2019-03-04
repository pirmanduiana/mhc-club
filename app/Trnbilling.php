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
        'employee_id',
        'doctor_id',
        'subtotal',
        'surcharge',
        'discount',
        'total'
    ];
}
