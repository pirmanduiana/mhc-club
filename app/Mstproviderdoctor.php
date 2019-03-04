<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstproviderdoctor extends Model
{
    //
    protected $table = "mst_provider_doctor";
    protected $fillable = [
        'name',
        'provider_id',
        'status_id'
    ];
}
