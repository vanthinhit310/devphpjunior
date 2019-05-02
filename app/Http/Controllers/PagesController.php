<?php

namespace App\Http\Controllers;

use App\Service\AboutService;
use App\Service\FavoriteService;
use App\Service\GareliesServie;
use App\Service\PostService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
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

    public function getMaiThanhPages(GareliesServie $gareliesServie)
    {
        $this->data['titlePage'] = 'Ngắm vợ yêu';
        $this->data['garellies'] = $gareliesServie->getGarellies();
        return view('practices.maithanh.index', $this->data);
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
        date('Y-m-d'); // 2016-10-12
        Carbon::now();
    }

}
