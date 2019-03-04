<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstclient extends Model
{
    //
    protected $table = "mst_client";
    protected $fillable = [
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
}
