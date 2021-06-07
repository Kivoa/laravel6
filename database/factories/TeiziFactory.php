<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teizi;
use Faker\Generator as Faker;

$factory->define(Teizi::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(1),
        'content' => $faker->paragraph(),
        'user_id' => $faker->randomDigit,
        'bankuai_id' => $faker->numberBetween(5,15),
    ];
});
