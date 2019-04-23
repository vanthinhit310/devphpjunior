<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/22/2019
 * Time: 9:20 PM
 */

namespace App\Service;


use App\Model\BlogPost;

class PostService
{
    public function getListPost(){
        $posts = BlogPost::orderBy('created_at', 'ASC')->get();
        return $posts;
    }

    public function getPostDetails($slug)
    {
        $post = BlogPost::where('slug',$slug)->with('getPostCategory')->first();
        return $post;
    }

    public function getLastedPost()
    {
        $lastPost = BlogPost::orderBy('created_at', 'DESC')->take(6)->get();
        return $lastPost;
    }
}
