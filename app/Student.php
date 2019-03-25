<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
    
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    
}
