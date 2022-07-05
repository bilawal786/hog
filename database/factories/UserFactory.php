<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->numerify('##########'),
        'address' => $faker->address,
        'city' => $faker->city,
        'password' => Hash::make('12345678'),
        'role' => 'driver',
        'created_at'=>'2022-05-17 05:48:18',
        'updated_at'=>'2022-05-17 05:48:18'
    ];
});
