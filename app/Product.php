<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
            'price', 'name', 'url_image', 'description'
        ];
    
    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('product_id', 'menu_id');
    }
}
