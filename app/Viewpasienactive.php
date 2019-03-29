<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewpasienactive extends Model
{
    //
    protected $table = 'vw_pasien_active';

    protected $fillable = [
        'mhc_code', 'name', 'client_id', 'jenis'
    ];
}
