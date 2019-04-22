<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/22/2019
 * Time: 1:25 PM
 */

namespace App\Service;


use App\Model\Favorite;

class FavoriteService
{
    public function getFavorites()
    {
        $favorites = Favorite::orderBy('ordering', 'ASC')->get();
        return $favorites;
    }
}
