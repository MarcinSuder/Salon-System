<?php

use Illuminate\Database\Seeder;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            $categories = new \App\Categories();
            $categories->name = $faker->city;
            $categories->save();
        }
    }
}
