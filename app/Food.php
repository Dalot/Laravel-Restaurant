<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use Orderable;
    
     protected $fillable = [
            'price', 'name', 'url_image', 'description', 'category_id'
        ];
    
    
    /**
     * Menu Relationship n-n
     * @return ['data'=>[App\Models\Menu]]
     */
    public function menu(){
        return $this->belongsToMany(Menu::class);
    }
    
}
