<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Garellies extends Model
{
    //
    protected $table = 'garellies';
    protected $fillable=['link','slug','created_at','updated_at'];
}
