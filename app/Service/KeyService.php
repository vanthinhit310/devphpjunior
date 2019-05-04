<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/4/2019
 * Time: 10:06 AM
 */

namespace App\Service;


use App\Model\Key;

class KeyService
{
    /*
     * Create new key to table Keys
     * */
    public function createKeyWords($data)
    {
        $key = Key::create($data);
        return $key;
    }
    /*
     * Get hot keys word
     * */
    public function getHotKeys()
    {
        $keys = Key::orderBy('count_search', 'DESC')->take(10)->get();
        return $keys;
    }
}
