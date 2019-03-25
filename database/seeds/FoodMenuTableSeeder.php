<?php

use Illuminate\Database\Seeder;
use App\Helpers\PivotSeeder;

class FoodMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $PivotSeeder = new PivotSeeder;    
        $PivotSeeder->seedPivotTable('food_menu');
    }
}
