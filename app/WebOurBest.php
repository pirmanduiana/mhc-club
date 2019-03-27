<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebOurBest extends Model
{
    //
    protected $table = "webourbest";
    protected $fillable = [
        'title',
        'icon', 
        'content',
        'status'
    ];
    
}
