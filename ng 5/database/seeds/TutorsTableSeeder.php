<?php

use Illuminate\Database\Seeder;

use App\Tutor;

class TutorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tutor::class,10)->create();
        // $faker = Faker\Factory::create();
    }
}
