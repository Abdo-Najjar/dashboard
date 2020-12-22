<?php

use App\Http\Controllers\Admin\{DashboardController, CountryController , CityController};
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function(){

    Route::get('home', [DashboardController::class , 'home'])->name('home');

    Route::get('smartDecisions', [DashboardController::class , 'smartDecisions'])->name('smartDecisions');
    
    Route::get('countries', [CountryController::class , 'index'])->name('countries.index');

    Route::get('countries/create', [CountryController::class , 'index'])->name('countries.create');
    
    Route::get('countries/{country}/edit', [CountryController::class , 'index'])->name('countries.edit');


    Route::get('cities', [CityController::class , 'index'])->name('cities.index');
});
