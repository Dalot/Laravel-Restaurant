<?php
namespace App;
class Cart 
{
    public $items = null;
    public $totalItemsQty;
    public $totalPrice;
    
    public function __construct($oldCart)
    {
        
        if ($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalItemsQty = $oldCart->totalItemsQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
       
    }
    
    public function add($item, $id, $qty, $type)
    {
        $storedItem = ['qty' => $qty, 'price' => $item->price, 'item' => $item];
        
        /*if($this->items)
        {   
            
            if(array_key_exists($id, $this->items))
            {
                
                $storedItem = $this->items[$id];
                $storedItem['total_price'] += (int) $item->price * $qty;
                $storedItem += $qty
            }
            
        }*/
        

        $storedItem['total_price'] = (int) $item->price * $qty;
        $this->totalItemsQty += $qty;
        $this->items[$type][$id] = $storedItem;
        
        $this->totalPrice += $storedItem['total_price'];
    }
}