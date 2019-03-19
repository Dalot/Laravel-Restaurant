<?php

use Faker\Generator as Faker;

$factory->define(App\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => Str::random(40),
        'price_person' => $faker->numberBetween($min = 0, $max = 30),
        'available' => $faker->boolean($chanceOfGettingTrue = 50),
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }
    ];
});
