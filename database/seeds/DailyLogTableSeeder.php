<?php

use App\Model\DailyLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Created by PhpStorm.
 * User: vanth
 * Date: 5/5/2019
 * Time: 1:20 PM
 */

class DailyLogTableSeeder extends Seeder
{
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        for($i=0; $i<500; $i++) {
            DailyLog::create([
                'title' => $faker->sentence(1),
                'private_author' => Str::random(10),
                'public_author' => Str::random(10),
                'cre_date' => '05/05/2019',
                'ordering' => 1,
                'status' => 0,
                'content' => $faker->paragraph(5)
            ]);
        }
    }
}
