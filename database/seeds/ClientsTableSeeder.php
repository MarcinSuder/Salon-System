<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
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
            $page->title = $faker->userName;
            $page->content = $faker->text(200);
            $page->category_id = rand(1,9);
            $page->save();
        }
    }
}
