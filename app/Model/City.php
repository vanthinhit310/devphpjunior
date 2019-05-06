<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'app_location_cities';

    public function getDistrict()
    {
        return $this->hasMany('App\\Model\\District');
    }
}
