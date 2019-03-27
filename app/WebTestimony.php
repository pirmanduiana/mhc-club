<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebTestimony extends Model
{
    //
    protected $table = "webtestimony";
    protected $fillable = [
        'user', 
        'testimony',
        'user_image',
        'status'
    ];
    
}
