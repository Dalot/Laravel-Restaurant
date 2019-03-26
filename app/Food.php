<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use Orderable;
    
     protected $fillable = [
            'price_food', 'name', 'url_image', 'description', 'category_id'
        ];
    
    
    /**
     * Menu Relationship n-n
     * @return ['data'=>[App\Models\Menu]]
     */
    public function menus(){
        return $this->belongsToMany(Menu::class);
    }
    
}
