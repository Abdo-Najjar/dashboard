<?php

use App\Http\Controllers\Admin\{CountryController};
use Illuminate\Support\Facades\Route;


Route::prefix('datatable')->name('datatable.')->middleware('auth')->group(function(){
    
    Route::get('countries' , [CountryController::class , 'datatable'])->name('countries');
});

