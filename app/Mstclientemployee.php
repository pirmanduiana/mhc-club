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
        'client_id',
        'department_id',
        'class_id',
        'status_id',
        'bpjs_code'
    ];

    public function client()
    {
        return $this->belongsTo(Mstclient::class, 'client_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Mstclientdepartment::class, 'department_id', 'id');
    }

    public function class()
    {
        return $this->hasOne(Mstclass::class, 'id', 'class_id');
    }

    public function tanggungan()
    {
        return $this->hasMany(Mstclientemployeemember::class, 'employee_id', 'id');
    }
}
