<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
     protected $fillable = [
            'price', 'name', 'url_image', 'description'
        ];
    
    
    /**
     * Menu Relationship n-n
     * @return ['data'=>[App\Models\Menu]]
     */
    public function menu(){
        return $this->belongsToMany(Menu::class);
    }
}
