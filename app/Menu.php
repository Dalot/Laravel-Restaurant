<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        
        ];
        
    public function food(){
        return $this->belongsToMany(Food::class)
            ->withPivot('food_id','menu_id')
            ->withTimestamps();
    }
}
