<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
    
}
