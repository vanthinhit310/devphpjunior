<?php

namespace App\Http\Controllers;

use App\Service\AboutService;
use App\Service\FavoriteService;
use App\Service\PostService;
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

}
