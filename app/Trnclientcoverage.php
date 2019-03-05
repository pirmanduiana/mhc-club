<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnclientcoverage extends Model
{
    //
    protected $table = "trn_client_coverage";
    protected $fillable = [
        'client_id',
        'coverage_id',
        'cob',
        'description'
    ];

    public function client()
    {
        return $this->hasOne(Mstclient::class, 'id', 'client_id');
    }

    public function coverage()
    {
        return $this->hasOne(Mstcoverage::class, 'id', 'coverage_id');
    }
}
