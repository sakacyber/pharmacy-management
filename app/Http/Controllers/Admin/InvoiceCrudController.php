<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InvoiceRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Carbon\Carbon;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class InvoiceCrudController
 *
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InvoiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\ReviseOperation\ReviseOperation;
    
    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Invoice::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/invoice');
        CRUD::setEntityNameStrings('invoice', 'invoices');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     *
     * @return void
     */
    protected function setupListOperation()
    {
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
        CRUD::column('#')->type('row_number');
        CRUD::column('invoice_no');
        CRUD::column('content');
        CRUD::column('total')->type('number');

        CRUD::addColumn([
            // 1-n relationship
            'label' => 'Create by', // Table column heading
            'type' => 'select',
            'name' => 'user_id', // the column that contains the ID of that connected entity;
            'entity' => 'user', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "App\Models\User", // foreign key model
        ]);
        CRUD::column('date');

        // add a button; possible types are: view, model_function
        $this->crud->addButtonFromModelFunction('line', 'preview_invoice', 'previewInvoice', 'beginning');

        // dynamic data to render in the following widget
        $count = \App\Models\Invoice::count();

        //add div row using 'div' widget and make other widgets inside it to be in a row
        Widget::add()->to('before_content')->type('div')->class('row')->content([

            //widget made using fluent syntax
            Widget::make()
                ->type('progress')
                ->class('card border-0 text-white bg-primary')
                ->progressClass('progress-bar')
                ->value($count)
                ->description('Invoice generated.')
                ->progress(100 * (int) $count / 100)
                ->hint(100 - $count.' more until next milestone.'),

            //widget made using the array definition
            Widget::make(
                [
                    'type' => 'card',
                    'class' => 'card bg-dark text-white',
                    'wrapper' => ['class' => 'col-sm-3 col-md-3'],
                    'content' => [
                        'header' => 'Example Widget',
                        'body' => 'Widget placed at "before_content" secion in same row',
                    ],
                ]
            ),
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     *
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(InvoiceRequest::class);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
        $currentTimestamp = Carbon::now('Asia/Phnom_Penh');
        CRUD::field('invoice_no')->value($currentTimestamp->timestamp);
        CRUD::field('date')->value($currentTimestamp);
        CRUD::field('content');
        CRUD::field('discount')->type('number')->value(0);
        CRUD::field('tax')->type('number')->value(0);
        CRUD::field('total')->type('number');

        CRUD::addField(
            [  // Select
                'label' => 'Create by',
                'type' => 'select',
                'name' => 'user_id', // the db column for the foreign key

                // optional
                // 'entity' should point to the method that defines the relationship in your Model
                // defining entity will make Backpack guess 'model' and 'attribute'
                'entity' => 'user',

                // optional - manually specify the related model and attribute
                'model' => "App\Models\User", // related model
                'attribute' => 'name', // foreign key attribute that is shown to user

                // optional - force the related options to be a custom query, instead of all();
                'options' => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), //  you can use this to filter the results show in the select
            ],
        );
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     *
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::field('content');
        CRUD::field('discount')->type('number')->value(0);
        CRUD::field('tax')->type('number')->value(0);
        CRUD::field('total')->type('number');

        CRUD::addField(
            [  // Select
                'label' => 'Create by',
                'type' => 'select',
                'name' => 'user_id', // the db column for the foreign key

                // optional
                // 'entity' should point to the method that defines the relationship in your Model
                // defining entity will make Backpack guess 'model' and 'attribute'
                'entity' => 'user',

                // optional - manually specify the related model and attribute
                'model' => "App\Models\User", // related model
                'attribute' => 'name', // foreign key attribute that is shown to user

                // optional - force the related options to be a custom query, instead of all();
                'options' => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), //  you can use this to filter the results show in the select
            ],
        );
    }
}
