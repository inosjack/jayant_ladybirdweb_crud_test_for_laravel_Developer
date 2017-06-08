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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});



$factory->define(App\Asset::class, function (Faker\Generator $faker) {
    $type = ['Software','Hardware'];
    $condition = ['Functional','Damaged','Stolen','Retired'];
    return [
        'name' => $faker->name,
        'type' => $type[array_rand($type)],
        'serial_number' => $faker->randomNumber(8),
        'asset_value' => $faker->randomNumber(5),
        'condition' => $condition[array_rand($condition)],
        'description' => $faker->text,
    ];
});


$factory->define(App\Employee::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'date_of_birth' => \Carbon\Carbon::now(),
        'gender'=> 'male',
        'designation' => $faker->jobTitle
    ];
});