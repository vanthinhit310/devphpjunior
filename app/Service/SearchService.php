<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/4/2019
 * Time: 8:44 AM
 */

namespace App\Service;


use App\Model\BlogPost;

class SearchService
{
    public function getListSearchBlog($key)
    {
        /*
         * Search function by key
         * */
        $posts = BlogPost::where('title', 'LIKE', '%' . $key . '%')
            ->orWhere('theme', 'LIKE', '%' . $key . '%')
            ->orWhere('key_work', 'LIKE', '%' . $key . '%')
            ->get();
        return $posts;
    }
}
