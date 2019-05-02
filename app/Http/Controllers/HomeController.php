<?php

namespace App\Http\Controllers;

use App\Service\AboutService;
use App\Service\SliderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getIndex(SliderService $slider, AboutService $aboutService)
    {
        $this->data['titlePage'] = 'Home';
        $this->data['sliders'] = $slider->getSliders();
        $this->data['about'] = $aboutService->getAbout();
        return view('index', $this->data);
    }
}
