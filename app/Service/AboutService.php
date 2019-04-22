<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/21/2019
 * Time: 6:31 PM
 */

namespace App\Service;


use App\Model\About;

class AboutService
{
    public function getAbout()
    {
        $about = About::first();
        return $about;
    }
}
