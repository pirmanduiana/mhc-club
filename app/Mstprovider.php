<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstprovider extends Model
{
    //
    protected $table = "mst_provider";
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
