<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Category extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'categories';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'url_image', 'time'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Food Relationship n-n
     */ 
    public function foods()
    {
        return $this->morphedByMany(Food::class, 'categorizable');
    }

    
    
    /**
     * Drink Relationship n-n
     */ 
    public function drinks()
    {
        return $this->morphedByMany(Drink::class, 'categorizable');
    }
    
    
    
    /**
     * Menu Relationship n-n
     */ 
    public function menus()
    {
        return $this->morphedByMany(Menu::class, 'categorizable');
    }
    
    /**
     * School Relationship n-n
     */ 
    public function schools()
    {
        return $this->morphedByMany(School::class, 'categorizable');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
