<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrderRequest as StoreRequest;
use App\Http\Requests\OrderRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('order', 'orders');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in OrderRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        
        // n-n relationship (with pivot table)
         $this->crud->addField([
           'label' => "Foods",
            'type' => 'select2_multiple',
            'name' => 'foods', // the method that defines the relationship in your Model
            'entity' => 'foods', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\Food", // foreign key model
            'pivot' => true, 
          ]);
        
        // n-n relationship (with pivot table)
         $this->crud->addColumn([
           'label' => "Foods", // Table column heading
           'type' => "select_multiple",
           'name' => 'foods', // the method that defines the relationship in your Model
           'entity' => 'foods', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Models\Food", // foreign key model,
          ]);
          // n-n relationship (with pivot table)
         $this->crud->addColumn([
           'label' => "Drinks", // Table column heading
           'type' => "select_multiple",
           'name' => 'drinks', // the method that defines the relationship in your Model
           'entity' => 'drinks', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Models\Drink", // foreign key model,
          ]);
          $this->crud->addColumn([
           'label' => "Menus", // Table column heading
           'type' => "select_multiple",
           'name' => 'menus', // the method that defines the relationship in your Model
           'entity' => 'menus', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Models\Menu", // foreign key model,
          ]);
           $this->crud->addColumn([
           // 1-n relationship
           'label' => "User", // Table column heading
           'type' => "select",
           'name' => 'user_id', // the column that contains the ID of that connected entity;
           'entity' => 'user', // the method that defines the relationship in your Model
           'attribute' => "name", // foreign key attribute that is shown to user
           'model' => "App\Models\User", // foreign key model
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
