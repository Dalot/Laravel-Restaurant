<?php

use Illuminate\Database\Seeder;

class FoodMenuTableSeeder extends Seeder
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
            
            
            if ( !array_search([$a,$b], $arr)  ) {
                DB::table('food_menu')->insert([
                'food_id' => $a,
                'menu_id' => $b
                ]);
                
                $arr[] = [$a,$b];
            }
            
            
        }
    }
}
