<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnclientlog extends Model
{
    //
    protected $table = "trn_client_log";
    protected $fillable = [
        'client_id',
        'notes'
    ];
}
