<?php

namespace App\Http\Controllers;

use App\Model\UserProfile;
use App\Service\ImgurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function updateProfileUser(Request $request)
    {
        $datas = $request->all();
        $user = Auth::user();
        //        upload hình ảnh và lấy về đường dẫn
        if (!empty($datas['imageProfile'])) {
            $image = $datas['imageProfile'];
            $imageUrl = ImgurService::uploadImage($image->getRealPath());
            $user->update([
                'name' => $datas['fullName'],
                'avatar' => $imageUrl
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
