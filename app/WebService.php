<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebService extends Model
{
    //
    protected $table = "webservice";
    protected $fillable = [
        'group',
        'icon',
        'title', 
        'desc',
        'image',
        'status'
    ];
    
}
