<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { 
    
    // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('patient', 'PatientCrudController');
    Route::crud('appointment', 'AppointmentCrudController');
    Route::crud('medicine', 'MedicineCrudController');
    Route::crud('report', 'ReportCrudController');
    Route::crud('service', 'ServiceCrudController');
    Route::crud('invoice', 'InvoiceCrudController');

    // custom
    Route::get('invoice/{id}/view', 'InvoiceCrudController@viewInvoice');
    Route::get('dashboard', 'DashboardController@index');
    
}); // this should be the absolute last line of this file
