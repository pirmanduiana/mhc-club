<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstclientemployeemember extends Model
{
    //
    protected $table = "mst_client_employee_member";
    protected $fillable = [
        'mhc_code',
        'name',
        'dob',
        'bpjs_code',
        'employee_id',
        'family_status',
        'status_id'
    ];

    public function employee()
    {
        return $this->belongsTo(Mstclientemployee::class, 'employee_id', 'id');
    }
}
