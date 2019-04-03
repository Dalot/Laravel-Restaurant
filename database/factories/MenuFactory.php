<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => Str::random(40),
        'url_image' => $faker->imageUrl($width = 600, $height = 600),
        'price_menu' => $faker->numberBetween($min = 0, $max = 30),
        'available' => $faker->boolean($chanceOfGettingTrue = 50),
        
        
    ];
});
