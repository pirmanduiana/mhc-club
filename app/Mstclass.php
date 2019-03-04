<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstclass extends Model
{
    //
    protected $table = "mst_class";
    protected $fillable = [
        'name', 'description'
    ];
}
