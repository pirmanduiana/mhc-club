<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trnblogcontent extends Model
{
    //
    protected $table = "trn_blog_content";
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'featured_img',
        'published'
    ];
}
