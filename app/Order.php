<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
    
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
