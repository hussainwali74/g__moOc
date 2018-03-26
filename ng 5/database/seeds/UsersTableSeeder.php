<?php
namespace seeds;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker\Factory::create();
       for($i = 0; $i<10; $i++){
            $user = User::create(array(
                'name' => $faker->name(),
                'photo' => $faker->name().'.png',
                'email' => $faker->name().'@gmail.com',
                'password' => bcrypt('hussain')
            ));
       }
    }
}
