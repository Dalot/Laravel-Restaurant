<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'school_id' => function () {
            return App\School::inRandomOrder()->first()->id;
        },
        'city' => $faker->city(),
        'country' => $faker->state(),
    ];
});
