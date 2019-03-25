<?php   

namespace App;

trait Orderable
{
    public function orders()
    {
        return $this->morphToMany(Order::class, 'orderable')->withTimestamps();
    }
    
 
}