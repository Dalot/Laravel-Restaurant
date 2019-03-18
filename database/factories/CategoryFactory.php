<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => Str::random(40),
        'url_image' => $faker->imageUrl($width = 200, $height = 200),
        'nest_depth' => $faker->numberBetween($min = 0, $max = 5),
    ];
});
