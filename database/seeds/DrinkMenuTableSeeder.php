<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DrinkMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
       
        foreach(range(1, 10) as $index)
        {
            $a = rand(1,5);
            $b = rand(1,5);
            
            
            if ( !array_search([$a,$b], $arr) ) {
                DB::table('drink_menu')->insert([
                'drink_id' => $a,
                'menu_id' => $b
                ]);
                
                $arr[] = [$a,$b];
            }
            
            
        }
    }
}