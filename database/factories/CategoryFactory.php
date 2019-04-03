<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 1) ,
        'url_image' => $faker->imageUrl($width = 200, $height = 200),
        'nest_depth' => $faker->numberBetween($min = 0, $max = 5),
    ];
});
