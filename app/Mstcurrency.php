<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstcurrency extends Model
{
    //
    protected $table = "mst_currency";
    protected $fillable = [
        'code', 'name',
        'exc_rate'
    ];
    
}
