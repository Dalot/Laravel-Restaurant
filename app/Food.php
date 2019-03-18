<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
   
    protected $fillable = [
        'title', 'description', 'url_image', 'category_id'
    ];
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
