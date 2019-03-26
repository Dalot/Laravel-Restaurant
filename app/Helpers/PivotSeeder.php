<?php

namespace App\Helpers;

use Illuminate\Database\Seeder;
use App\Order;

class PivotSeeder extends Seeder
{
    public function __construct()
    {
        
    }
    
    
    private function is_array_unique(array $needle, array $haystack)
    {
        foreach($haystack as $arr)
        {
            if($needle[0] === $arr[0] && $needle[1] === $arr[1])
            {
                return false;
            }
            
        }
        return true;
    }
    
    
    public function seedPivotTable(string $table_name)
    {
    $arr = [];
    $models = explode("_", $table_name);
    
        foreach(range(1, 10) as $index)
        {
            $a = rand(1,5);
            $b = rand(1,2);
            
            
            if ( $this->is_array_unique([$a,$b], $arr)  ) {
                \DB::table($table_name)->insert([
                $models[0] . '_id' => $a,
                $models[1] . '_id' => $b
                ]);
                
                $arr[] = [$a,$b];
            }
            
            
        }
    }
    
    var $buffer = [];
    
    public function fetchUniqueId()
    {
        

        $id = Order::inRandomOrder()->first()->id;
        
        if ( array_search($id,$this->buffer) )
        {
            return $this->fetchUniqueId();
        }
        
        $this->buffer[] = $id;
        return $id;
        
    }
    
    
}
