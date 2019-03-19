<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * Order Relationship 1-n
     * @return void
     */
    public function food(){
        return $this->belongsTo(Food::class);
    }
    
    
    /**
     * Menu Relationship 1-n
     * @return void
     */
    public function drink(){
        return $this->belongsTo(Drink::class);
    }
    
    
    
    /**
     * Order Relationship 1-n
     * @return void
     */
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
    
    
    
    /**
     * Menu Relationship 1-n
     * @return void
     */
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
