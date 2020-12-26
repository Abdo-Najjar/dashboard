<?php

use App\Http\Controllers\Admin\{CategoryController, DashboardController, CountryController , CityController, MainServiceController , RequiredWorkController};
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('home', [DashboardController::class , 'home'])->name('home');

    Route::get('smartDecisions', [DashboardController::class , 'smartDecisions'])->name('smartDecisions');
    
    Route::resource('countries',CountryController::class );

    Route::resource('cities', CityController::class );

    Route::resource('mainServices'  , MainServiceController::class);

    Route::resource('categories'  , CategoryController::class);

    Route::resource('requiredWorks'  , RequiredWorkController::class);
});
