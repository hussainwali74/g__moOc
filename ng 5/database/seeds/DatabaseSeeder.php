<?php

use Illuminate\Database\Seeder;
// use UsersTableSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        factory(App\User::class,10)->create();
        // DB::table('users')->insert([
        //     'name' => str_random(10),
        //     'photo' => str_random(10).'.png',
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('hussain')
        // ]);
    }
}
