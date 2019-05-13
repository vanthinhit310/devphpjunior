<?php

namespace App\Http\Controllers;

use App\Service\GareliesServie;
use App\Service\ImgurService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

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

    /**
     * Show the application dashboard.
     * Crop image with plugins croppie js then save on server
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function imageCrop(Request $request)
    {
        $image_file = $request->image;
        try {
            if (isset($image_file) && $image_file != null) {
                list($type, $image_file) = explode(';', $image_file);
                list(, $image_file) = explode(',', $image_file);
                $image_file = base64_decode($image_file);
                $image_name = time() . '_' . rand(100, 999) . '.png';
                $path = public_path('uploads/' . $image_name);
                file_put_contents($path, $image_file);
                //Merge image with new image
                $image = Image::make($path);
                $frame = Image::make('images/frame.png');
                $imgFinal = $image->insert($frame, 'top-left', 0, 0);
                $imgFinal->save(public_path('uploads/' . $image_name), 100);
                $uploadedPath = 'uploads/' . $image_name;
//                upload to IMGUR
                $imageUrl = ImgurService::uploadImage($uploadedPath);
                //Delete Image after upload to Imgur
                if (File::exists($uploadedPath)) {
                    File::delete($uploadedPath);
                }
                return response()->json([
                    'error' => false,
                    'message' => 'Photos uploaded successfully',
                    'imagePath' => $imageUrl
                ])->setStatusCode(Response::HTTP_OK);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'An error occurred. cannot upload this photo'
                ])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $throwable) {
            return response()->json([
                'error' => true,
                'message' => 'Unknown error',
                'devMessage' => $throwable->getMessage()
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    public function wifeImageCrop(Request $request, GareliesServie $gareliesServie)
    {
        $image_file = $request->wifeImage;
        try {
            if (isset($image_file) && $image_file != null) {
                list($type, $image_file) = explode(';', $image_file);
                list(, $image_file) = explode(',', $image_file);
                $image_file = base64_decode($image_file);
                $image_name = time() . '_' . rand(100, 999) . '.png';
                $path = public_path('uploads/' . $image_name);
                file_put_contents($path, $image_file);
                $uploadedPath = 'uploads/' . $image_name;
//                upload to IMGUR
                $imageUrl = ImgurService::uploadImage($uploadedPath);
                $gareliesServie->createGarellies($imageUrl);
                //Delete Image after upload to Imgur
                if (File::exists($uploadedPath)) {
                    File::delete($uploadedPath);
                }
                return response()->json([
                    'error' => false,
                    'message' => 'Photos uploaded successfully',
                    'imagePath' => $imageUrl
                ])->setStatusCode(Response::HTTP_OK);
            } else {
                DB::rollBack();
                return response()->json([
                    'error' => true,
                    'message' => 'An error occurred. cannot upload this photo'
                ])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $throwable) {
            DB::rollBack();
            return response()->json([
                'error' => true,
                'message' => 'Unknown error',
                'devMessage' => $throwable->getMessage()
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }
}
