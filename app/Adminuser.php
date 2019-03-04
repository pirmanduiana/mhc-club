<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adminuser extends Model
{
    //
    protected $table = "admin_users";
    protected $fillable = [
        'name', 'email', 'password',
        'username',
        'password',
        'name',
        'avatar',
        'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
