<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {

    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
        'quantity' => $faker->numberBetween($min = 0, $max = 30),
        'status' => $faker->randomElement($array = array ('In Progress','Done','Canceled')),
        'delay' => $faker->numberBetween($min = 30, $max = 2880),
       
    ];
});
