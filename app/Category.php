<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'name', 'description', 'url_image', 'category_id', 'nest_depth'
    ];
     
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
}
