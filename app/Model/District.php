<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'app_location_districts';

    public function getDistrict()
    {
        return $this->hasMany('App\\Model\\District');
    }
}
