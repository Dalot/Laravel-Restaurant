<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MenuRequest as StoreRequest;
use App\Http\Requests\MenuRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;
use App\Menu;

/**
 * Class MenuCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class MenuCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Menu');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/menu');
        $this->crud->setEntityNameStrings('menu', 'menus');
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        // add asterisk for fields that are required in MenuRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
        
        
        $this->crud->addField([
            'name' => 'name',
            'label' => "Menu Name",
            'type' => 'textarea',

        ]);
        $this->crud->addField([
            'name' => 'price_menu',
            'label' => "Individual Menu Price",
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
        
        
        // LIST ENTRIES
        $this->crud->addColumn([
            'name' => 'name',
            'type' => 'text',
            'label' => 'Menu Name',
        ]);
        $this->crud->addColumn([
            'name' => 'price_menu',
            'type' => 'number',
            'label' => 'Price Menu',
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
    
    public function showDetailsRow($id)
    {
        $this->crud->hasAccessOrFail('details_row');

        // $this->data['entry'] = $this->crud->getEntry($id);
        // $this->data['crud'] = $this->crud;
        $menu = Menu::find($id)->first();
        
        $drinks = $menu->drinks->map(function ($drink) {
            return $drink->only(['name', 'price_drink']);
        });
        $foods = $menu->foods->map(function ($food) {
            return $food->only(['name', 'price_food']);
        });
        $this->data = ['drinks' => $drinks, 'foods' => $foods];
        
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('crud::details_row_menu', $this->data );
    }
}
