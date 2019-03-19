<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Menu;

$factory->define(App\Product::class, function (Faker $faker) {
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
