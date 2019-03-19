<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'quantity', 'status', 'delay'
        ];
    
    
    public function orderItem(){
        return $this->hasMany(OrderItem::class);
    }
    
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
