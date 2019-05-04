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

    /*
     * Update count_search of key
     * */
    public function updateCountSearch($key)
    {
        $word = Key::where('key', $key)->first();
        $count_search = $word->count_search;
        return $word->update([
            'count_search' => $count_search + 1
        ]);
    }
}
