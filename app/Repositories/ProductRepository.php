<?php

namespace App\Repositories;

use App\Exceptions\ProductCreateErrorException;
use App\Food;
use App\Drink;
use App\Menu;

/**
 * Interface UserRepository
 * @package namespace App\Repositories;
 */

class ProductRepository
{
    public function getProductType($array)
    {
        return $array['type'];
    }
    
    
    public function getProductTypeByUrl($url)
    {
        
        
        if ( strpos($url, 'food') !== false )
        {
            return 'food';
        }
        else if (strpos($url, 'drink') !== false )
        {
            return 'drink';
        }
        else if (strpos($url, 'menu') !== false )
        {
            return 'menu';
        }
        
        return abort(500, 'Wrong Request');
    }
    
    public function create($data, $type)
    {
        if($type == 'drink')
        {
            return Drink::create($data);
        }
        else if ($type == 'food')
        {
            return Food::create($data);
        }
        
        return Menu::create($data);
    }
    

    
    public function findProductById($id, $type)
    {
        if($type == 'drink')
        {
            return Drink::findOrFail($id);
        }
        else if ($type == 'food')
        {
            return Food::findOrFail($id);
        }
        
        return Menu::findOrFail($id);
        
    }
    
    
    
    public function update($data, $type, $id)
    {
       if($type == 'drink')
        {
            Drink::findOrFail($id)->update($data);
        }
        else if ($type == 'food')
        {
            Food::findOrFail($id)->update($data);
        }
        else
        {
            Menu::findOrFail($id)->update($data);
        }
        
        
        return Drink::findOrFail($id);
       
    }
}