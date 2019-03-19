<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'quantity', 'status', 'delay'
        ];
    
    public function foods()
    {
        return $this->morphedByMany(Food::class, 'orders');
    }
    
    public function drinks()
    {
        return $this->morphedByMany(Drink::class, 'orders');
    }
    
    public function menus()
    {
        return $this->morphedByMany(Menu::class, 'orders');
    }
    
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
