<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/25/2019
 * Time: 1:09 AM
 */

namespace App\Service;


use App\Model\Garellies;

class GareliesServie
{
    public function getGarellies()
    {
        $garellies = Garellies::orderBy('created_at','desc')->get();
        return $garellies;
    }
}
