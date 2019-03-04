<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstdisease extends Model
{
    //
    protected $table = "mst_disease";
    protected $fillable = [
        'name',
        'notes'
    ];
}
