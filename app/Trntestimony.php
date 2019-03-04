<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trntestimony extends Model
{
    //
    protected $table = "trn_testimony";
    protected $fillable = [
        'guest_name',
        'post_date',
        'subject',
        'message'
    ];
}
