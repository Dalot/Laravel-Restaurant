<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('product_id', 'menu_id');
    }
}
