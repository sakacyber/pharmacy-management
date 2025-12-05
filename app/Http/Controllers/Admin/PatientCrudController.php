<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
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
 * Class PatientCrudController
 *
 * @property-read CrudPanel $crud
 */
class PatientCrudController extends CrudController
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
        CRUD::setModel(Patient::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/patient');
        CRUD::setEntityNameStrings('patient', 'patients');
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
        $this->crud->orderBy('enter_date', 'desc');

        CRUD::column('#')->type('row_number');
        CRUD::column('name');
        CRUD::column('gender')->type('select_from_array')->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other']);
        CRUD::column('age');
        CRUD::column('address');
        CRUD::column('enter_date');
        CRUD::column('description');

        // dynamic data to render in the following widget
        // $count = \App\Models\Patient::count();
        // $countLastMonth = \App\Models\Patient::count();

        // Get the current month and year
        $currentMonth = date('m');
        $currentYear = date('Y');

        // Count users for the current month
        $count = Patient::whereMonth('enter_date', $currentMonth)
            ->whereYear('enter_date', $currentYear)
            ->count();

        // Count users for the previous month
        // Get the date for the first day of the previous month
        $firstDayOfLastMonth = now()->subMonth()->startOfMonth();

        // Get the date for the last day of the previous month
        $lastDayOfLastMonth = now()->subMonth()->endOfMonth();
        $countLastMonth = Patient::whereBetween('enter_date', [$firstDayOfLastMonth, $lastDayOfLastMonth])
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
                    ->class('card')
                    ->value($count)
                    ->description('New patients this month')
                    ->progress(100 * (int) $count / 100)
                    ->progressClass('progress-bar bg-primary')
                    ->hint(100 - $count.' more until next milestone.'),

                // widget made using the array definition
                Widget::make()
                    ->type('progress_white')
                    ->class('card')
                    ->value($countLastMonth)
                    ->description('New patients last month')
                    ->progress(100 * (int) $countLastMonth / 100)
                    ->progressClass('progress-bar bg-primary')
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
        CRUD::setValidation(PatientRequest::class);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']);
         */
        $currentTimestamp = Carbon::now('Asia/Phnom_Penh');

        CRUD::field('name');
        CRUD::field('gender')->type('select_from_array')->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other']);
        CRUD::field('age')->type('number');
        CRUD::field('phone');
        CRUD::field('address');
        CRUD::field('description');
        CRUD::field('enter_date')->value($currentTimestamp);
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
        CRUD::field('name');
        CRUD::field('gender')->type('select_from_array')->options(['male' => 'Male', 'female' => 'Female', 'other' => 'Other']);
        CRUD::field('age')->type('number');
        CRUD::field('phone');
        CRUD::field('address');
        CRUD::field('description');
        CRUD::field('enter_date')->type('datetime');
    }
}
