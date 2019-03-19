<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DrinksTableSeeder::class);
        $this->call(FoodsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(OrderItemsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
