<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstclientemployee extends Model
{
    //
    protected $table = "mst_client_employee";
    protected $fillable = [
        'mhc_code',
        'name',
        'dob',
        'address',
        'phone',
        'department_id',
        'class_id',
        'status_id',
        'bpjs_code'
    ];
}
