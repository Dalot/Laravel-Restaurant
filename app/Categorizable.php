<?php   

namespace App;

trait Categorizable
{
    
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable')->withTimestamps();
    }
    
 
}