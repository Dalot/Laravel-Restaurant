<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
   
    protected $fillable = [
        'title', 'description', 'url_image', 'category_id'
    ];
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    public function menu(){
        return $this->belongsToMany(Menu::class)
            ->withPivot('food_id','menu_id')
            ->withTimestamps();
    }
}
