<?php
/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 4/25/2019
 * Time: 1:09 AM
 */

namespace App\Service;


use App\Model\Garellies;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GareliesServie
{
    public function getGarellies()
    {
        $garellies = Garellies::orderBy('created_at', 'desc')->get();
        return $garellies;
    }

    public function createGarellies($imagePath)
    {
        if (isset($imagePath) && $imagePath != null) {
            DB::beginTransaction();
            $garellies = Garellies::create([
                'link' => $imagePath,
                'slug' => Str::slug($imagePath)
            ]);
            DB::commit();
        }
        return $garellies;
    }

}
