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
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Topic::class, function (Faker $faker) {
    $title = $faker->sentence(mt_rand(3,10));
    return [
        'user_id' => 1,
        'name'    => $title,
        'answer'  => $faker->paragraph,
        'description' => $faker->sentence,
        'created_at'        => \Carbon\Carbon::now(),
    ];
});
