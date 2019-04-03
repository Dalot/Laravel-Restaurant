<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Helpers\PivotSeeder;
use Carbon\Carbon;

class CategorizablesTableSeeder extends Seeder
{
    public $buffer;
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
     
     
    public function run(Faker $faker)
    {
        $PivotSeeder = new PivotSeeder;    
        
        
        foreach(range(1, 50) as $index)
        {
            
            DB::table('categorizables')->insert([
            'category_id' => $PivotSeeder->fetchUniqueCategoryId(),
            'categorizable_id' => rand(1,5),
            'categorizable_type' => $faker->randomElement($array = array ('App\Food','App\Menu','App\Drink')),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        }
    }
    
    
}
