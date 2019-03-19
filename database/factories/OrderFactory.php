<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {

            $table->BigInteger('food_id')->unsigned()->nullable();
            $table->BigInteger('menu_id')->unsigned()->nullable();
            $table->BigInteger('user_id')->unsigned();
            $table->unsignedInteger('quantity')->default(1);
            $table->string('status')->default("In Progress");
            $table->unsignedInteger('delay')->nullable(); 
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
