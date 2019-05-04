<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/4/2019
 * Time: 8:21 AM
 */

namespace App\Repositories;


use App\Model\BlogPost;

/**
 * @method newQuery()
 */
class PostRepository extends EloquentRepository
{

    public function model()
    {
        // TODO: Implement model() method.
        return BlogPost::class;
    }
}
