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
        
        // Pivot Tables
        $this->call(DrinkMenuTableSeeder::class);
        $this->call(FoodMenuTableSeeder::class);
        $this->call(ClientStudentTableSeeder::class);
        
        // Tables with dependencies
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderablesTableSeeder::class);
        $this->call(CategorizablesTableSeeder::class);
        //$this->call(CartTableSeeder::class); -> replaced with Cart package from Crinsane for now
        

    }
}
