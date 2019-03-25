<?php

use Faker\Generator as Faker;

$factory->define(App\Cart::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'payment_method' => $faker->randomElement($array = array ('Stripe','Paypal','Cash')),
        'is_active' => $faker->boolean(),
        'total_price' => $faker->numberBetween($min = 0, $max = 200),
        'total_products' => $faker->numberBetween($min = 0, $max = 200),
    ];
});
