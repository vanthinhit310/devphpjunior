<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $table = 'slider';
    protected $fillable =['image','title','name','description','created_at','updated_at'];
}
