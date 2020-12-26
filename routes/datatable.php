<?php

use App\Http\Controllers\Admin\{CategoryController, CityController, CountryController, MainServiceController, RequiredWorkController};
use Illuminate\Support\Facades\Route;


Route::prefix('datatable')->name('datatable.')->middleware('auth')->group(function(){
    
    Route::get('countries' , [CountryController::class , 'datatable'])->name('countries');

    Route::get('cities' , [CityController::class , 'datatable'])->name('cities');

    Route::get('mainServices' , [MainServiceController::class ,'datatable' ])->name('mainServices');
    
    Route::get('categories' , [CategoryController::class ,'datatable' ])->name('categories');

    Route::get('requiredWorks' , [RequiredWorkController::class ,'datatable' ])->name('requiredWorks');
});

