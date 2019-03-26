<?php

namespace App\Repositories;

use App\Food;
use App\Drink;
use App\Menu;
use App\Order;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */

class OrderRepository
{
 
    
    public function create($data)
    {
        $offset = array_search('products', array_keys($data));
        
        $orderData = array_slice($data, 0, $offset);
      
        return Order::create($orderData);
       
    }
    

    public function createProductAssociations($data, $order, $user_id)
    {
        $foods = [];
        $drinks = [];
        $menus = [];
        
        $dataFoodsIds = $data["products"]["foods"];
        $dataDrinksIds = $data["products"]["drinks"];
        $dataMenusIds = $data["products"]["menus"];
        
        
        if( sizeof($dataFoodsIds) )
        {
            foreach($dataFoodsIds as $id)
            {
                $order->foods()->attach($id, ['user_id' => $user_id]);
            }
        }
        
        if( sizeof($dataDrinksIds) )
        {
            foreach($dataDrinksIds as $id)
            {
                $order->drinks()->attach($id, ['user_id' => $user_id]);
            }
        }
        
        if( sizeof($dataMenusIds) )
        {
            foreach($dataMenusIds as $id)
            {
                
                $order->menus()->attach($id, ['user_id' => $user_id]);
            }
        }
        
       return [$foods, $drinks, $menus];
    }
    
    
    
    public function update($data, $type, $id)
    {
      
    }
}