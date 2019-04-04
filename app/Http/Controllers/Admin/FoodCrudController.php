<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\FoodRequest as StoreRequest;
use App\Http\Requests\FoodRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class FoodCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class FoodCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Food');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/food');
        $this->crud->setEntityNameStrings('food', 'foods');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // add asterisk for fields that are required in FoodRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        
        $this->crud->addField([
            'name' => 'name',
            'label' => "Food Name",
            'type' => 'textarea',

        ]);
       
        $this->crud->addField([
            'name' => 'price_food',
            'label' => "Individual Food Price",
            'type' => 'number',
            'attributes' => ["step" => "any"], // allow decimals

        ]);
        $this->crud->addField([
            'name' => 'description',
            'label' => "Description",
            'type' => 'textarea',

        ]);
        $this->crud->addField([
            'name' => 'url_image',
            'label' => "Image",
            'type' => 'browse'
        ]);
        $this->crud->addField([
            'label' => "Menus",
            'type' => 'select2_multiple',
            'name' => 'menus', // the relationship name in your Model
            'entity' => 'menus', // the relationship name in your Model
            'attribute' => 'name', // attribute on Menu that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
        
        
        // LIST ENTRIES
        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Food Name',
        ]);
        $this->crud->addColumn([
            'name' => 'price_drink',
            'type' => 'number',
            'label' => 'Price Drink',
        ]);
        
         $this->crud->addColumn([
            'name' => 'description',
            'type' => 'text',
            'label' => 'Description',
        ]);
         $this->crud->addColumn([
            'name' => 'url_image',
            'label' => 'Image',
            'type' => 'image',
            'prefix' => 'http://lex.dalot.xyz/restaurant/public/',
        ]);
        
        
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
