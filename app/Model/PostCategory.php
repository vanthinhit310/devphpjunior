<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    //
    protected $table = 'post_categories';
    protected $fillable =['name','theme','slug','created_at','updated_at'];
}
