<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'description', 'food_id', 'drink_id', 'price_person', 'available'
        ];
        
    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }
    
    public function drinks()
    {
        return $this->belongsToMany(Drink::class);
    }
    
    public function orders()
    {
        return $this->morphToMany(Order::class);
    }
}
