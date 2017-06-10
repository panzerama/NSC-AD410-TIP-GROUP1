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
        'division_name' => $faker
            ->sentence($nbWords = 3, $variableNbWords = true),
        'abbr' => implode($faker
            ->unique()
            ->randomElements(
                $array = array('A', 'B', 'C', 'D', 'E', 'F'), $count=3)),
        'is_active' => $faker->boolean($chanceOfGettingTrue = 90)
       ]; 
});

$factory->define(App\faculty::class, function (Faker\Generator $faker) {
   
   return [
        'division_id' => 
            App\division::where('is_active', 1)
                        ->inRandomOrder()->first()->division_id,
        'faculty_name' => $faker->name,
        'email' => $faker->safeEmail,
        /* 
        took this out since token is dead to us. --Luke
        'token' => $faker->sha1,
        */
        'employee_type' => $faker->randomElement(['enum', 'values']),
        'is_admin' => $faker->boolean($chanceOfGettingTrue = 2),
        'is_active' => $faker->boolean($chanceOfGettingTrue = 80)
       ]; 
});

$factory->define(App\tip::class, function (Faker\Generator $faker) {
    
    $created_date = $faker->dateTimeBetween($startDate = '-1 year', $endDate = '-4 months', $timezone = date_default_timezone_get());

    return [
        'division_id' => App\division::where('is_active', 1)->inRandomOrder()->first()->division_id,
        'course_name' => $faker->words($nb = 3, $asText = true) ,
        'course_number' => 
            implode($faker->unique()->randomElements($array = array('A', 'B', 'C', 'D', 'E', 'F'), $count=3)) . $faker->randomDigitNotNull,
        'quarter' => $faker->randomElement($array = array ('FALL','WINTER','SPRING','SUMMER')),
        'year' => $faker->year($max = 'now'),
        'is_finished' => $faker->boolean($chanceOfGettingTrue = 70),
        'is_active' => true,
        'is_group' => $faker->boolean($chanceOfGettingTrue = 10),
        'created_at' => $created_date,
        'updated_at' => $faker->dateTimeBetween($startDate = $created_date, $endDate = 'now', $timezone = date_default_timezone_get())
    ];
});


$factory->define(App\answer::class, function (Faker\Generator $faker){
   
   $parent_question = App\question::where('is_active', 1)->inRandomOrder()->get()->first();
   $created_date = $faker->dateTimeBetween($startDate=$parent_question->created_at, $endDate = 'now', $timezone=date_default_timezone_get());
   
   return [
       'question_id'	=> $parent_question->question_id,
       'answer_text'	=> $faker->sentence($nbWords = 10, $variableNbWords = true),
       'is_active'	    => true,
       'created_at'	    => $created_date,
       'updated_at'	    => $faker->dateTimeBetween($startDate = $created_date, $endDate = 'now', $timezone = date_default_timezone_get())
       ];
});

//faculty tips
//this should only be used for random data. If a proper database with relation-
//ships is needed, use whole function

$factory->define(App\faculty_tip::class, function(Faker\Generator $faker){
    
    $target_tip = App\tip::inRandomOrder()->first();
    
    return [
        'faculty_id' => App\faculty::
            where('division_id', $target_tip->division_id)
            ->inRandomOrder()
            ->first(),
        'tips_id' => $target_tip->tips_id
        ];
});

//tips questions
//this should only be used for random data. If a proper database with relation-
//ships is needed, use whole function

$factory->define(App\tips_questions::class, function(Faker\Generator $faker){
    
    return [
        'question_id' => App\question::
            inRandomOrder()
            ->first()
            ->question_id,
        'tips_id' => App\tip::
            inRandomOrder()
            ->first()
            ->tips_id,
        'question_answer' => $faker->sentence($nbWords = 6, $variableNbWords = true)
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

*/

