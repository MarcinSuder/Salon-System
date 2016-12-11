<?php

use Illuminate\Database\Seeder;
use App\Pages;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            $page = new Pages();
            $page->title = $faker->company;
            $page->content = $faker->text(200);
            $page->category_id = rand(1,9);
            $page->save();
        }
    }
}