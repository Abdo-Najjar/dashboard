<?php

use App\Http\Controllers\Admin\{CategoryController, DashboardController, CountryController, CityController, MainServiceController, RequiredWorkController};
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::get('home', [DashboardController::class, 'home'])->name('home');

    Route::get('smartDecisions', [DashboardController::class, 'smartDecisions'])->name('smartDecisions');

    Route::resource('countries', CountryController::class)->except(['store', 'update']);

    Route::resource('cities', CityController::class)->except(['store', 'update']);

    Route::resource('mainServices', MainServiceController::class)->except(['store', 'update']);

    Route::resource('categories', CategoryController::class)->except(['store', 'update']);

    Route::resource('requiredWorks', RequiredWorkController::class)->except(['store', 'update']);

    Route::get('reports/mainService');
});
