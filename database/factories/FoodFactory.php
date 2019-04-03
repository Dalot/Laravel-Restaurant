<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => Str::random(40),
        'url_image' => $faker->imageUrl($width = 600, $height = 600),
        'price_food' => $faker->numberBetween($min = 0, $max = 30),
        'category_id' => function () {
            return App\Category::inRandomOrder()->first()->id;
        }
    ];
});
