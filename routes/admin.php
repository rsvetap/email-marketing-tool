<?php

use App\Http\Controllers\Admin\DashboardController;
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
    });
});
