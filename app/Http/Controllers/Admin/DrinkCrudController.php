<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DrinkRequest as StoreRequest;
use App\Http\Requests\DrinkRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class DrinkCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DrinkCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Drink');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/drink');
        $this->crud->setEntityNameStrings('drink', 'drinks');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in DrinkRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        
         $this->crud->addField([
            'label' => "Menus",
            'type' => 'select2_multiple',
            'name' => 'menus', // the relationship name in your Model
            'entity' => 'menus', // the relationship name in your Model
            'attribute' => 'name', // attribute on Menu that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
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
