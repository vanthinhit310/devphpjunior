<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $table = 'about';
    protected $fillable = ['title','blog_qoutes','description','ps','facebook','youtube','google','github','linkedin','skype','website','email','phone','address','fax','name','age','birth_day','contact_qoutes'];
}
