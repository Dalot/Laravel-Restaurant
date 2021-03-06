<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
