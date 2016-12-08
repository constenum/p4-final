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

$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'student_number' => $faker->numberBetween($min = 2017001, $max = 2023001),
        'first_name' => $faker->firstName($gender = 'female'),
        'last_name' => $faker->lastName,
        'card_number' => $faker->numberBetween($min = 1617001, $max = 1617999),
    ];
});

$factory->define(App\Subject::class, function (Faker\Generator $faker) {
    return [
        'subject' => $faker->word,
    ];
});

$factory->define(App\Session::class, function (Faker\Generator $faker) {
    return [
        'subject_id' => $faker->randomElement(App\Subject::pluck('id')->toArray()),
        'student_id' => $faker->randomElement(App\Student::pluck('id')->toArray()),
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
    ];
});
