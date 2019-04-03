<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    
    use Orderable, Categorizable;
    
     protected $fillable = [
            'price_drink', 'name', 'url_image', 'description', 'category_id'
        ];
    
    
    
    /**
     * Menu Relationship n-n
     * @return ['data'=>[App\Models\Menu]]
     */
    public function menu(){
        return $this->belongsToMany(Menu::class);
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
