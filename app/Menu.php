<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    use Orderable;
    
    protected $fillable = [
        'name', 'description', 'price_menu', 'available'
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
