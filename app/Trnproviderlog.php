<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnproviderlog extends Model
{
    //
    protected $table = "trn_provider_log";
    protected $fillable = [
        'provider_id',
        'notes'
    ];
}
