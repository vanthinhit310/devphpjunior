<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Model\UserProfile;
use App\Service\ImgurService;
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
            $str = substr($imageUrl,20,7);
            $str = $str.'b';
            $urlImage = 'https://i.imgur.com/'.$str.'.jpg';
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
}
