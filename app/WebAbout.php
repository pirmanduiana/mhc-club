<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebAbout extends Model
{
    //
    protected $table = "webabout";
    protected $fillable = [
        'title', 
        'content',
        'image_logo',
        'image_about',
        'image_title',
        'outhor_name',
        'status'
    ];
    
}
