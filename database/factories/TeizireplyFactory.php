<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teizireply;
use Faker\Generator as Faker;

$factory->define(Teizireply::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->paragraph(),
        'teizi_id' => $faker->randomDigit,
        'user_id' => $faker->randomDigit,
        
    ];
});
