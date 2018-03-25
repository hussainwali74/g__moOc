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
        DB::table('users')->insert([
            'name' => str_random(10),
            'photo' => str_random(10).'.png',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('hussain')
        ]);
    }
}
