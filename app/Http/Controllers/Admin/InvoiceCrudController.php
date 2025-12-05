<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
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
use Carbon\Carbon;

/**
 * Class InvoiceCrudController
 *
 * @property-read CrudPanel $crud
 */
class InvoiceCrudController extends CrudController
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
        CRUD::setModel(Invoice::class);
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
        $this->crud->orderBy('date', 'desc');

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
        $this->crud->addButtonFromView('line', 'button-view-invoice', 'viewInvoice', 'beginning');

        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Count users for the current month
        $count = Invoice::whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->count();

        $firstDayOfLastMonth = now()->subMonth()->startOfMonth();

        // Get the date for the last day of the previous month
        $lastDayOfLastMonth = now()->subMonth()->endOfMonth();
        $countLastMonth = Invoice::whereBetween('date', [$firstDayOfLastMonth, $lastDayOfLastMonth])
            ->count();

        // add div row using 'div' widget and make other widgets inside it to be in a row
        Widget::add()
            ->to('before_content')
            ->type('div')
            ->class('row')
            ->content([

                // widget made using fluent syntax
                Widget::make()
                    ->type('progress_white')
                    ->class('card border-0')
                    ->progressClass('progress-bar bg-primary')
                    ->value($count)
                    ->description('Invoice generated this month.')
                    ->progress(100 * (int) $count / 100)
                    ->hint(100 - $count.' more until next milestone.'),

                // widget made using fluent syntax
                Widget::make()
                    ->type('progress_white')
                    ->class('card border-0')
                    ->progressClass('progress-bar bg-primary')
                    ->value($countLastMonth)
                    ->description('Invoice generated last month.')
                    ->progress(100 * (int) $countLastMonth / 100)
                    ->hint(100 - $countLastMonth.' more until next milestone.'),
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
         * - CRUD::addField(['name' => 'price', 'type' => 'number']);
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
            ],
        );
    }

    public function viewInvoice($id)
    {
        $invoice = Invoice::find($id);

        return view('invoice', ['invoice' => $invoice]);
    }
}
