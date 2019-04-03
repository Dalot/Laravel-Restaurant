<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name', 'description', 'url_image', 'nest_depth'
    ];
     
     
    /**
     * Food Relationship n-n
     */ 
    public function foods()
    {
        return $this->morphedByMany(Food::class, 'categorizable');
    }

    
    
    /**
     * Drink Relationship n-n
     */ 
    public function drinks()
    {
        return $this->morphedByMany(Drink::class, 'categorizable');
    }
    
    
    
    /**
     * Menu Relationship n-n
     */ 
    public function menus()
    {
        return $this->morphedByMany(Menu::class, 'categorizable');
    }
}
