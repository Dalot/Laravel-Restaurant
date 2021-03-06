<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SchoolRequest as StoreRequest;
use App\Http\Requests\SchoolRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class SchoolCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class SchoolCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\School');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/school');
        $this->crud->setEntityNameStrings('school', 'schools');
        
        
        $this->crud->addField([
            'label' => "Categories",
            'type' => 'select2_multiple',
            'name' => 'categories', // the relationship name in your Model
            'entity' => 'categories', // the relationship name in your Model
            'attribute' => 'name', // attribute on Menu that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
        
        // n-n relationship (with pivot table)
         $this->crud->addColumn([
           'label' => "Categories", // Table column heading
           'type' => "select_multiple",
           'name' => 'categories', // the method that defines the relationship in your Model
           'entity' => 'categories', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Models\Category", // foreign key model,
          ]);
          
          

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in SchoolRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
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
