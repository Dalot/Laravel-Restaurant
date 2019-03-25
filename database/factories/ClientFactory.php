<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return App\User::inRandomOrder()->first()->id;
        },
        'school_id' => function () {
            return App\School::inRandomOrder()->first()->id;
        },
        'phone_1' => $faker->phoneNumber(),
        'phone_2' => $faker->phoneNumber(),
        'address' => $faker->address(),
        'zipcode' => '4325532461',
        'city' => $faker->city(),
        'state' => $faker->state(),
        'country' => $faker->state(),
    ];
});

