<?php

namespace App\Http\Controllers;

use App\Service\ImgurService;
class UploadController extends Controller
{
    //
    public function uploadImage()
    {
        $data = request()->all();
        $image = $data['imageTest'];
        // call service to upload image to imgur.com
        $imageUrl = ImgurService::uploadImage($image->getRealPath());
        dd($imageUrl);
    }
}
