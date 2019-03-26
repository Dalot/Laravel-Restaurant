<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    
    protected $fillable = [
        'quantity', 'status', 'delay', 'price', 'user_id'
        ];
    
  
    
  public function foods()
  {
      return $this->morphedByMany(Food::class, 'orderable')->withTimestamps();
  }
  
  public function drinks()
  {
      return $this->morphedByMany(Drink::class, 'orderable')->withTimestamps();
  }
  
  public function menus()
  {
      return $this->morphedByMany(Menu::class, 'orderable')->withTimestamps();
  }
  

  

}
