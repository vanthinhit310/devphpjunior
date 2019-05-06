<?php

namespace App\Http\Controllers;

use App\Service\AboutService;
use App\Service\AddressService;
use App\Service\DailyLogService;
use App\Service\FavoriteService;
use App\Service\GareliesServie;
use App\Service\KeyService;
use App\Service\PostService;
use App\Service\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    private $data;

    public function getAboutPages(AboutService $about, FavoriteService $favorite)
    {
        $this->data['titlePage'] = 'About us';
        $this->data['favorites'] = $favorite->getFavorites();
        $this->data['about'] = $about->getAbout();
        return view('about.index', $this->data);
    }

    public function getBlogPages(AboutService $about, PostService $post)
    {
        $this->data['titlePage'] = 'Blog';
        $this->data['about'] = $about->getAbout();
        $this->data['posts'] = $post->getListPost();
        return view('blog.index', $this->data);
    }

    public function getContactPages(AboutService $about)
    {
        $this->data['titlePage'] = 'Contact us';
        $this->data['about'] = $about->getAbout();
        return view('contact.index', $this->data);
    }

    public function getPostPages(PostService $postService, Request $request)
    {
        $slug = $request->slug;
        $post = $postService->getPostDetails($slug);
        $postService->updateViewOfPost($slug);
        $this->data['post'] = $postService->getPostDetails($slug);
        $this->data['lastedPosts'] = $postService->getLastedPost();
        $this->data['topViews'] = $postService->getListTopViews();
        $this->data['themePosts'] = $postService->getThemeOfPost();
        $this->data['titlePage'] = $post->title;
        return view('post-details.index', $this->data);
    }
    
    public function getResetPasswordPage()
    {
        $this->data['titlePage'] = 'Get new password';
        return view('users.resetPassword', $this->data);
    }

    public function getChangePasswordPage()
    {
        $this->data['titlePage'] = 'Change your password';
        return view('users.changePassword', $this->data);
    }

    public function getUpdatePasswordPage()
    {
        $this->data['titlePage'] = 'Update your password';
        return view('users.update-password', $this->data);
    }

    public function getCreateLogPage()
    {
        $currentTime = Carbon::now();
        $this->data['titlePage'] = 'Log #'.$currentTime->format('d.m.Y');
        $this->data['day'] = $currentTime->format('d/m/Y');
        return view('log-daily.index-create-log', $this->data);
    }

    public function getListLogDailyPage(DailyLogService $dailyLogService)
    {
        $this->data['titlePage'] = 'Views all log';
        $this->data['logs'] = $dailyLogService->getDailyLog();
        return view('log-daily.list-daily-log', $this->data);
    }

    public function getLogDetailsPage($id = null, DailyLogService $service)
    {
        $details = $service->getLogDetails($id);
        if (isset($details)) {
            $this->data['titlePage'] = 'Log number #' . $details->id;
            $this->data['details'] = $details;
            return view('log-daily.log-detail', $this->data);
        }else{
            return redirect()->back()->with([
                'error' => 'Not found! We can\'t find any log with this id.'
            ]);
        }
    }

    public function getProfilePages(UserService $service, AddressService $address)
    {
        $param = [];
        $param['titlePage'] = 'Profile/'.Auth::user()->name;
        $param['profile'] = $service->getProfileUser();
        $param['cities'] = $address->getAllCities();
        return view('users.profile', $param);
    }
}
