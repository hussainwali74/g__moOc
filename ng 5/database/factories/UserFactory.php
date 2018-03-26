<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'photo' => $faker->name.'.png',
        'email' => $faker->unique()->safeEmail,
        'password' => $password ? : $password = bcrypt('hussain'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tutor::class, function (Faker $faker) {
    return [
        'user_id'=>$faker->numberBetween( $min = 1, $max = 10),
        'about' => $faker->realText( $maxNbChars = 100),
        'city' => $faker->city(),
        'institution' => $faker->company()
    ];
});
$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'tutor_id'=>$faker->numberBetween( $min = 1, $max = 10),
        'level' => $faker->randomElement(['Beginner','Intermediate','Expert','All']),
        'language' => $faker->randomElement(['Urdu','English']),
        'title' => $faker->name,
        'description' => $faker->realText( $maxNbChars = 50),
        'photo' => $faker->name.'.png',
    ];
});
