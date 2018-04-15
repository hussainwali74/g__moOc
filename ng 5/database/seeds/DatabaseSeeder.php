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
    //   $this->call(UsersTableSeeder::class);
      $this->call(TutorsTableSeeder::class);
      $this->call(CourseTableSeeder::class);
      $this->call(StudentsTableSeeder::class);
      factory(App\User::class,10)->create();
 
    }
}
