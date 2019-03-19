<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function school()
    {
        return $this->belongsTo(School::class);
    }
    
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}