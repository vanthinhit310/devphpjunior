<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/21/2019
 * Time: 12:32 AM
 */

namespace App\Service;


use App\Model\Slider;

class SliderService
{
    public function getSliders()
    {
        $sliders = Slider::orderBy('ordering', 'ASC')->get();
        return $sliders;
    }
}
