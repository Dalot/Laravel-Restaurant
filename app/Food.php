<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Food extends Model 
{
    use Orderable, Categorizable;
    
     protected $fillable = [
            'price_food', 'name', 'url_image', 'description', 'category_id'
        ];
    
    
    /**
     * Menu Relationship n-n
     */
    public function menus(){
        return $this->belongsToMany(Menu::class);
    }
    
    /**
     * Category Relationship n-n
     */
    public function categories()
    {
        return $this->morphToMany('Category', 'categorizable');
    }
    
    
    /**
     * BUYABLE INTERFACE
     */
    public function getBuyableIdentifier($options = null){
        return $this->id;
    }

    public function getBuyableDescription($options = null){
        return $this->name;
    }

    public function getBuyablePrice($options = null){
        return $this->price;
    }
    
    public function getBuyableType($options = null){
        return $this->type;
    }
}
