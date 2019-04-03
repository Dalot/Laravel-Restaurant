<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    use Orderable, Categorizable;
    
    protected $fillable = [
        'name', 'description', 'price_menu', 'available'
        ];
        
        
        
    /**
     * Product Relationship n-n
     * @return ['data'=>[App\Models\Product]]
     */
    public function foods(){
        return $this->belongsToMany(Food::class);
    }
    
    
    
    /**
     * Product Relationship n-n
     * @return ['data'=>[App\Models\Product]]
     */
    public function drinks(){
        return $this->belongsToMany(Drink::class);
    }
    
    
    /**
     * Category Relationship n-n
     * @return ['data'=>[App\Models\Menu]]
     */
    public function categories()
    {
        return $this->morphToMany('Category', 'categorizable');
    }
    
    
    
}
