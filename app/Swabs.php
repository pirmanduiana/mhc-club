<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Swabs extends Model
{
    //

    public function dokter()
    {
        return $this->hasOne('App\SwabMDokter', 'id', 'swab_m_dokter_id');
    }

    public function kelamin()
    {
        return $this->hasOne('App\SwabMKelamin', 'id', 'swab_m_kelamin_id');
    }

    public function hasil()
    {
        return $this->hasOne('App\SwabMHasil', 'id', 'swab_m_hasil_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();    
    //     static::addGlobalScope('sl', function ($builder) {
    //         $builder->where('sl', '0');
    //     });
    // }
}
