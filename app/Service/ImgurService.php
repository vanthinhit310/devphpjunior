<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/5/2019
 * Time: 8:45 PM
 */

namespace App\Service;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

class ImgurService
{
    const END_POINT = 'https://api.imgur.com/3/image';

    public static function uploadImage($imagePath)
    {
        $client = new GuzzleClient();
        try {
            $request = $client->request(
                'POST',
                ImgurService::END_POINT,
                [
                    'headers' => [
                        'Authorization' => "Client-ID " . env('IMGUR_CLIENT_ID'), // post as anonymous
                    ],
                    'form_params' => [
                        'image' => file_get_contents($imagePath)
                    ]
                ]
            );
            $response = (string) $request->getBody();
            $jsonResponse = json_decode($response);
            return $jsonResponse->data->link; // return url of image
        } catch (GuzzleException $e) {
            return redirect()->back()->with([
                'error' => 'Image not upload!'
            ]);
        }

    }
}
