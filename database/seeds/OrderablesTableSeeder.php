<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;

class OrderablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        foreach(range(1, 5) as $index)
        {
         
            DB::table('orderables')->insert([
            'user_id' => App\User::inRandomOrder()->first()->id,
            'order_id' => App\Order::inRandomOrder()->first()->id,
            'orderable_id' => rand(1,5),
            'orderable_type' => $faker->randomElement($array = array ('App\Food','App\Menu','App\Drink')),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        }
    }
}
