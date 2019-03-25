<?php

use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'name' => $faker->company(),
        'address' => $faker->address(),
        'city' => $faker->city(),
        'country' => $faker->state(),
    ];
});
