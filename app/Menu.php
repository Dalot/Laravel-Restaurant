<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'description', 'price_person', 'available'
        ];
        
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('product_id','menu_id')->withTimestamps();
    }
}
