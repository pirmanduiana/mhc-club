<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mstclientdepartment extends Model
{
    //
    protected $table = "mst_client_department";
    protected $fillable = [
        'name'
    ];
}
