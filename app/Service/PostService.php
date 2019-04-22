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
}
