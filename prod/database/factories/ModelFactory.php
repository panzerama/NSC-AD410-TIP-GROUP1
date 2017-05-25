<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\tip::class, function (Faker\Generator $faker) {

    return [
        'tips_id' => $faker->randomDigitNotNull,
        'division_id' => '1',
        'course_name' => $faker->name,
        'course_number' => $faker->randomDigitNotNull,
        'quarter' => $faker->randomElement($array = array ('1', '2', '3', '4')),
        'year' => $faker->year($max = 'now'),
        'is_finished' => $faker->boolean($chanceOfGettingTrue = 80),
        'is_active' => true,
    ];
});