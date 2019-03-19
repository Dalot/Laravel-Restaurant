<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {

    return [
        'food_id' => $faker->name,
        'menu_id' => function () {
                    return factory(App\Menu::class)->create()->id;
                },
        'quantity' => $faker->numberBetween($min = 0, $max = 30),
        'status' => $faker->randomElement($array = array ('In Progress','Done','Canceled')),
        'delay' => $faker->numberBetween($min = 30, $max = 2880)
       
    ];
});
