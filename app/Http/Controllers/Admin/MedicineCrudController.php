<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MedicineRequest;
use App\Models\Medicine;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Backpack\ReviseOperation\ReviseOperation;

/**
 * Class MedicineCrudController
 *
 * @property-read CrudPanel $crud
 */
class MedicineCrudController extends CrudController
{
    use CreateOperation;
    use DeleteOperation;
    use ListOperation;
    use ReviseOperation;
    use ShowOperation;
    use UpdateOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Medicine::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/medicine');
        CRUD::setEntityNameStrings('medicine', 'medicines');
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
        CRUD::column('name');
        CRUD::column('price_buy')->type('number');
        CRUD::column('price_sell')->type('number');
        CRUD::column('expired_date');
        CRUD::column('description');

        // dynamic data to render in the following widget
        $count = Medicine::count();

        // add div row using 'div' widget and make other widgets inside it to be in a row
        Widget::add()->to('before_content')->type('div')->class('row')->content([

            // widget made using fluent syntax
            Widget::make()
                ->type('progress')
                ->class('card border-0 text-white bg-primary')
                ->progressClass('progress-bar')
                ->value($count)
                ->description('Medicine listed.')
                ->progress(100 * (int) $count / 100)
                ->hint(100 - $count.' more until next milestone.'),

            // widget made using the array definition
            Widget::make(
                [
                    'type' => 'card',
                    'class' => 'card bg-dark text-white',
                    'wrapper' => ['class' => 'col-sm-3 col-md-3'],
                    'content' => [
                        'header' => 'Example Widget',
                        'body' => 'Widget placed at "before_content" section in same row',
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
        CRUD::setValidation(MedicineRequest::class);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']);
         */
        CRUD::field('name');
        CRUD::field('expired_date')->type('date');
        CRUD::field('price_buy');
        CRUD::field('price_sell');
        CRUD::field('description');
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
        $this->setupCreateOperation();
    }
}
