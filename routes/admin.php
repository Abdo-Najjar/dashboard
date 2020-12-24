<?php

use App\Http\Controllers\Admin\{DashboardController, CountryController , CityController};
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('home', [DashboardController::class , 'home'])->name('home');

    Route::get('smartDecisions', [DashboardController::class , 'smartDecisions'])->name('smartDecisions');
    
    Route::resource('countries',CountryController::class );

    Route::get('cities', [CityController::class , 'index'])->name('cities.index');
});
