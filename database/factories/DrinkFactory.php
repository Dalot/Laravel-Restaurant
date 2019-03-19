<?php

use Faker\Generator as Faker;

$factory->define(App\Drink::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => Str::random(40),
        'url_image' => $faker->imageUrl($width = 200, $height = 200),
        'price' => $faker->numberBetween($min = 0, $max = 30),
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});
