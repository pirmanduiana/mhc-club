<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syscompany extends Model
{
    //
    protected $table = "sys_company";
    protected $fillable = [
        "name", "address", "latitude",
        "longitude", "main_phone", "main_website",
        "main_email", "featured_img", "description"
    ];
}
