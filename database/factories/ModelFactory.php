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

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->safeEmail,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'task' => $faker->sentence(),
        'meta' => $faker->sentence(3),
    ];
});


$factory->define(App\TaskCategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(3),
        'title' => $faker->sentence(2),
    ];
});


$factory->define(App\TaskList::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->sentence(2),
    ];
});

