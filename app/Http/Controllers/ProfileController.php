<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Model\UserProfile;
use App\Service\AddressService;
use App\Service\ImgurService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function updateProfileUser(ProfileRequest $request)
    {
        $datas = $request->all();
        $user = Auth::user();
        //        upload hình ảnh và lấy về đường dẫn
        if (!empty($datas['image'])) {
            $image = $datas['image'];
            $imageUrl = ImgurService::uploadImage($image->getRealPath());
            $str = substr($imageUrl, 20, 7);
            $str = $str . 'b';
            $urlImage = 'https://i.imgur.com/' . $str . '.jpg';
            $user->update([
                'name' => $datas['fullName'],
                'avatar' => $urlImage
            ]);
        } else {
            $user->update([
                'name' => $datas['fullName']
            ]);
        }
        $profile = $user->getProfileUser()->where('user_id', $user->id)->first();
        try {
            if ($profile == null) {

                UserProfile::create([
                    'user_id' => $user->id,
                    'birth_day' => $datas['birthDay'],
                    'phone' => $datas['phone'],
                    'address' => $datas['address'],
                    'facebook_link' => $datas['facebook'],
                    'github_link' => $datas['github']

                ]);
                return redirect()->back()->with([
                    'success' => 'Your profile has updated!'
                ]);
            } else {
                $profile->update([
                    'birth_day' => $datas['birthDay'],
                    'phone' => $datas['phone'],
                    'address' => $datas['address'],
                    'facebook_link' => $datas['facebook'],
                    'github_link' => $datas['github']

                ]);
                return redirect()->back()->with([
                    'success' => 'Your profile has updated!'
                ]);
            }
        } catch (\Throwable $throwable) {
            return redirect()->back()->with([
                'error' => $throwable->getMessage()
//                'devMessage' => $throwable->getMessage()
            ]);
        }
    }


    public function getDistrictBelongToCity(Request $request, AddressService $service)
    {
        $city_id = $request->id;
        $districts = $service->getDistrictOfCity($city_id);
        try {
            if (!empty($districts)) {
                return response()->json([
                    'districts' => $districts
                ])->setStatusCode(Response::HTTP_OK);
            } else {
                return response()->json([
                    'Error' => 'Can\'t get data of this city at the moment. Please again!'
                ])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }

        } catch (\Throwable $throwable) {
            return response()->json([
                'Error' => 'Unknown error! Please try later.'
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }

    public function getWardOfDistrict(Request $request, AddressService $service)
    {
        $district_id = $request->id;
        $wards = $service->getWardOfDistrict($district_id);
        try {
            if (!empty($wards)) {
                return response()->json([
                    'wards' => $wards
                ])->setStatusCode(Response::HTTP_OK);
            } else {
                return response()->json([
                    'Error' => 'Can\'t get data of this city at the moment. Please again!'
                ])->setStatusCode(Response::HTTP_BAD_REQUEST);
            }

        } catch (\Throwable $throwable) {
            return response()->json([
                'Error' => 'Unknown error! Please try later.'
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }
}
