<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TodoList;
use Faker\Generator as Faker;

$factory->define(TodoList::class, function (Faker $faker) {
    return [
        'description' => substr($faker->sentence(2), 0, -1),
        'color' => $faker->randomDigit(),
        'done' => $faker->boolean(),
        'pomodoro_count' => $faker->randomDigit(),
        'started_at' => $faker->dateTime(),
        'finished_at' => $faker->dateTime(),
    ];
});
