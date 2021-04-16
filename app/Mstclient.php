<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstclient extends Model
{
    //
    protected $table = "mst_client";
    protected $fillable = [
        'code',
        'name',
        'address',
        'phone',
        'fax',
        'website',
        'email',
        'contract_number',
        'contract_start',
        'contract_end',
        'status_id'
    ];

    public function employees()
    {
        return $this->hasMany(Mstclientemployee::class, 'client_id', 'id');
    }
}
