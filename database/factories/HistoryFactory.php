<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\History;
use Faker\Generator as Faker;

$factory->define(History::class, function (Faker $faker) {
    return [
        'city_id' => $faker->randomElement([4164138, 4167147, 5128581]),
        'humedity' => $faker->numberBetween(10,80)
    ];
});
