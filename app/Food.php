<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
     protected $fillable = [
            'price', 'name', 'url_image', 'description'
        ];
    
    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
    
    public function orders()
    {
        return $this->morphToMany(Order::class);
    }
}
