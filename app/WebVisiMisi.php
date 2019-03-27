<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebVisiMisi extends Model
{
    //
    protected $table = "webvisimisi";
    protected $fillable = [
        'title', 
        'content',
        'status'
    ];
    
}
