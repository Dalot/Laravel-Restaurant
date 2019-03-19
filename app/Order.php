<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
