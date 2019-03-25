<?php

use Illuminate\Database\Seeder;
use App\Helpers\PivotSeeder;


class DrinkMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $PivotSeeder = new PivotSeeder;    
       $PivotSeeder->seedPivotTable('drink_menu');
    }
}
