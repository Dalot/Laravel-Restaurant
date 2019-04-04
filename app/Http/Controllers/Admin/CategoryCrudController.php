<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CategoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/category');
        $this->crud->setEntityNameStrings('category', 'categories');
        
        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 50);

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        // add asterisk for fields that are required in CategoryRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        
        $this->crud->removeField('nest_depth');
        $this->crud->removeColumn('nest_depth');
        $this->crud->addField([
            'name' => 'url_image',
            'label' => "Image",
            'type' => 'browse'
        ]);
        
        $this->crud->addField([
            'label' => "Drinks",
            'type' => 'select2_multiple',
            'name' => 'drinks', // the relationship name in your Model
            'entity' => 'drinks', // the relationship name in your Model
            'attribute' => 'name', // attribute on Menu that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
        $this->crud->addField([
            'label' => "Foods",
            'type' => 'select2_multiple',
            'name' => 'foods', // the relationship name in your Model
            'entity' => 'foods', // the relationship name in your Model
            'attribute' => 'name', // attribute on Menu that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
        ]);
        $this->crud->addField([
            'label' => "Menus",
            'type' => 'select2_multiple',
            'name' => 'menus', // the relationship name in your Model
            'entity' => 'menus', // the relationship name in your Model
            'attribute' => 'name', // attribute on Menu that is shown to admin
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
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
