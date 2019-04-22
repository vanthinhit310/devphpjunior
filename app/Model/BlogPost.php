<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    //
    protected $table = 'blog_posts';
    protected $fillable = ['title','author','view','theme','description','image','key_work','slug','ordering','content','created_at','updated_at'];


}
