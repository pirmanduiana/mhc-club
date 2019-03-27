<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebSlider extends Model
{
    //
    protected $table = "websliders";
    protected $fillable = [
        'title', 
        'content',
        'image_name',
        'status'
    ];
    
}
