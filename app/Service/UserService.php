<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/5/2019
 * Time: 11:41 PM
 */

namespace App\Service;


use App\Model\UserProfile;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function getUserByID($id)
    {
        $user = User::where('id',$id)->first();
        return $user;
    }
    public function getProfileUser(){
        $user_id = Auth::user()->id;
        $profileUser = UserProfile::where('user_id', $user_id)->first();
        return $profileUser;
    }
}
