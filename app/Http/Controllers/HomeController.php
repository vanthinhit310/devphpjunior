<?php

namespace App\Http\Controllers;

use App\Service\SliderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex(SliderService $slider)
    {
        $this->data['titlePage'] = 'Home';
        $this->data['sliders'] = $slider->getSliders();
        return view('index', $this->data);
    }
}
