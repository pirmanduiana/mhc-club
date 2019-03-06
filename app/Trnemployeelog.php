<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnemployeelog extends Model
{
    //
    protected $table = "trn_employee_log";
    protected $fillable = [
        'employee_id',
        'notes',
        'user_id'
    ];
}
