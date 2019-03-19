<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {

    return [
        'food_id' => function () {
                    return factory(App\Food::class)->create()->id;
                },
        'drink_id' => function () {
                    return factory(App\Drink::class)->create()->id;
                },
        'menu_id' => function () {
                    return factory(App\Menu::class)->create()->id;
                },
        'user_id' => function () {
                    return factory(App\User::class)->create()->id;
                },
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 500),
        'quantity' => $faker->numberBetween($min = 0, $max = 30),
        'status' => $faker->randomElement($array = array ('In Progress','Done','Canceled')),
        'delay' => $faker->numberBetween($min = 30, $max = 2880)
       
    ];
});
