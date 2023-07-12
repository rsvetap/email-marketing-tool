<?php

use App\Http\Controllers\Admin\Customer\CustomerController;
use App\Http\Controllers\Admin\Customer\CustomerGroupController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\Tools\CKEditorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.',
], function () {

    Route::group([
        'as' => 'auth.',
    ], function () {
        //******************************************************************************************************
        // AUTH
        //******************************************************************************************************
        Auth::routes(['verify' => false, 'register' => false, 'confirm' => false]);
    });

    Route::group([
        'middleware' => [
            'auth:admin',
        ],
    ], function () {

        // =============================================================================================================
        // DASHBOARD
        // =============================================================================================================
        Route::group([
            'as' => 'dashboard.',
        ], function () {
            Route::controller(DashboardController::class)->group(function () {
                Route::get('', 'index')->name('index');
            });
        });

        //******************************************************************************************************
        // CUSTOMERS
        //******************************************************************************************************
        Route::group([
            'as' => 'customer.',
            'prefix' => 'customers',
        ], function () {
            Route::controller(CustomerController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('datatable', 'datatable')->name('datatable');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('{customer}', 'show')->name('show');
                Route::put('{customer}', 'update')->name('update');
                Route::delete('{customer}', 'destroy')->name('destroy');
                Route::post('{customer}', 'attachGroups')->name('attachGroups');
            });
        });

        //******************************************************************************************************
        // CUSTOMER GROUPS
        //******************************************************************************************************
        Route::group([
            'as' => 'customer-group.',
            'prefix' => 'customer-groups',
        ], function () {
            Route::controller(CustomerGroupController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('datatable', 'datatable')->name('datatable');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('{group}', 'show')->name('show');
                Route::put('{group}', 'update')->name('update');
                Route::delete('{group}', 'destroy')->name('destroy');
            });
        });

        //******************************************************************************************************
        // EMAIL TEMPLATES
        //******************************************************************************************************
        Route::group([
            'as' => 'email-template.',
            'prefix' => 'email-templates',
        ], function () {
            Route::controller(EmailTemplateController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('datatable', 'datatable')->name('datatable');
                Route::get('{template}', 'show')->name('show');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::put('{template}', 'update')->name('update');
                Route::delete('{template}', 'destroy')->name('destroy');
            });
        });

        //******************************************************************************************************
        // CKEDITOR
        //******************************************************************************************************
        Route::group(['as' => 'ckeditor.', 'prefix' => 'ckeditors'], function () {
            Route::controller(CKEditorController::class)->group(function () {
                Route::post('upload', 'upload')->name('upload');
            });
        });

    });
});
