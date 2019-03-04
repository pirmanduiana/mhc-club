<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnproviderplafon extends Model
{
    //
    protected $table = "trn_provider_plafon";
    protected $fillable = [
        'provider_id',
        'disease_id',
        'description'
    ];
}
