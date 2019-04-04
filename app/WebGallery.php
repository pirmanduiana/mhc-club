<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebGallery extends Model
{
    //
    protected $table = "webgallery";
    protected $fillable = [
        'title', 
        'image',
        'status'
    ];
    
}
