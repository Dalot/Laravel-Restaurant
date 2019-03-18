<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => Str::random(40),
        'url_image' => $faker->imageUrl($width = 200, $height = 200),
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});
