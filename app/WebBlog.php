<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebBlog extends Model
{
    //
    protected $table = "webblog";
    protected $fillable = [
        'user',
        'title', 
        'content',
        'image',
        'status'
    ];
    
}
