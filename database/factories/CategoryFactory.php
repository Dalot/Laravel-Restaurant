<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => Str::random(40),
        'url_image' => $faker->imageUrl($width = 200, $height = 200),
        'nest_depth' => numberBetween($min = 0, $max = 5),
    ];
});
