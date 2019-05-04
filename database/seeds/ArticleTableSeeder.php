<?php

use App\Model\Article;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();

        for($i=0; $i<500; $i++) {
            Article::create([
                'title' => $faker->sentence(3),
                'body' => $faker->paragraph(10),
                'tags' => join(',', $faker->words(4))
            ]);
        }
    }
}
