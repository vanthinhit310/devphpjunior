<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Service\ImgurService;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * @property  data
 */
class DevTestController extends Controller
{
    public function DevTest()
    {

        $date = Carbon::now();
        echo $date->format('d.m.Y');
    }

    public function index()
    {
        $param = [];
        $param['titlePage'] = 'Test page';
        return view('general.function_testing', $param);
    }
    public function uploadImage()
    {
        $data = request()->all();
        $image = $data['imageTest'];
        $imageUrl = ImgurService::uploadImage($image->getRealPath());
        return redirect()->back()->with([
            'success' => $imageUrl
        ]);
    }
}
