<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Helpers\PivotSeeder;
use Carbon\Carbon;

class OrderablesTableSeeder extends Seeder
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
            
            DB::table('orderables')->insert([
            'order_id' => $PivotSeeder->fetchUniqueOrderId(),
            'orderable_id' => rand(1,5),
            'orderable_type' => $faker->randomElement($array = array ('App\Models\Food','App\Models\Menu','App\Models\Drink')),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

        }
    }
    
    
}
