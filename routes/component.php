<?php

/****************************
 *  This routes related to all components routes
 ****************************/

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:admins')->group(function () {
    Route::controller(CategoryController::class)->prefix('category')->as('category.')->group(function () {
        Route::get('for-product/{isParent?}', 'forProduct')->name('forProduct');
    });

});
