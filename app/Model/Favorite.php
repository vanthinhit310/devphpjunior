<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    protected $table ='favorites';
    protected $fillable = ['name', 'logo','ordering', 'created_at', 'updated_at'];
}
