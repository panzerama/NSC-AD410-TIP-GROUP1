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

$factory->define(App\division::class, function (Faker\Generator $faker) {
   return [
        'division_name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'abbr' => implode($faker->unique()->randomElements($array = array('A', 'B', 'C', 'D', 'E', 'F'), $count=3)),
        'is_active' => $faker->boolean($chanceOfGettingTrue = 90)
       ]; 
});

$factory->define(App\faculty::class, function (Faker\Generator $faker) {
   
   return [
        'division_id' => App\division::where('is_active', 1)->inRandomOrder()->first()->division_id,
        'faculty_name' => $faker->name,
        'email' => $faker->safeEmail,
        'employee_type' => $faker->randomElement(['enum', 'values']),
        'is_admin' => $faker->boolean($chanceOfGettingTrue = 2),
        'is_active' => $faker->boolean($chanceOfGettingTrue = 80)
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



/*

$factory->define(App\question::class, function (Faker\Generator $faker){
   
   return [
       'answer_id'	    => $faker->,
       'question_id'	=> $faker->,
       'answer_text'	=> $faker->,
       'is_active'	    => true,
       'created_at'	    => $faker->,
       'updated_at'	    => $faker->
       ];
       
});

$factory->define(App\answer::class, function (Faker\Generator $faker){
   
   return [
       'answer_id'	    => $faker->,
       'question_id'	=> $faker->,
       'answer_text'	=> $faker->,
       'is_active'	    => true,
       'created_at'	    => $faker->,
       'updated_at'	    => $faker->
       ];
       
});
*/

