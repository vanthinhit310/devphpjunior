<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/22/2019
 * Time: 9:20 PM
 */

namespace App\Service;


use App\Model\BlogPost;
use App\Model\PostCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostService
{
    public function getListPost()
    {
        $posts = BlogPost::orderBy('created_at', 'ASC')->paginate(8);
        return $posts;
    }

    public function getPostDetails($slug)
    {
        $post = BlogPost::where('slug', $slug)->with('getPostCategory')->first();
        return $post;
    }

    public function getLastedPost()
    {
        $lastPost = BlogPost::orderBy('created_at', 'DESC')->take(6)->get();
        return $lastPost;
    }

    public function updateViewOfPost($slug)
    {
        $post = BlogPost::where('slug', $slug)->with('getPostCategory')->first();
        $views = $post->view;
        $blogKey = 'blog_' . $slug;
        if ($views == 0) {
            $views = 1;
            DB::table('blog_posts')
                ->where('slug', $slug)
                ->update(['view' => $views]);
            Session::put($blogKey, 1);
        } else {
            $blogKey = 'blog_' . $slug;
            if (!Session::has($blogKey)) {
                DB::table('blog_posts')
                    ->where('slug', $slug)
                    ->update(['view' => $views + 1]);
                Session::put($blogKey, 1);
            }
        }
    }

    public function getListTopViews()
    {
        $topViews = BlogPost::orderBy('view', 'desc')->take(6)->get();
        return $topViews;
    }
    public function getThemeOfPost(){
        $themePosts = PostCategory::all();
        return $themePosts;
    }
}
