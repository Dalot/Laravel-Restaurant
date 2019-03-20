<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    use Orderable;
    
    protected $fillable = [
        'name', 'description', 'food_id', 'drink_id', 'price_person', 'available'
        ];
        
        
        
    /**
     * Product Relationship n-n
     * @return ['data'=>[App\Models\Product]]
     */
    public function food(){
        return $this->belongsToMany(Food::class);
    }
    
    
    
    /**
     * Product Relationship n-n
     * @return ['data'=>[App\Models\Product]]
     */
    public function drink(){
        return $this->belongsToMany(Drink::class);
    }
    
    
    
    
    
}
