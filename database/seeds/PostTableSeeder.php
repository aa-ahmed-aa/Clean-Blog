<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('posts')->insert([
                'title'=>$faker->text(50),
                'content'=>$faker->paragraph,
                'category_id'=>$faker->numberBetween(1, 5),
                'user_id'=>$faker->numberBetween(1, 10)
            ]);

        }
    }
}
