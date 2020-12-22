<?php

use App\Http\Controllers\Vue\CountryCountroller;
use App\Http\Controllers\Vue\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('vue.')->prefix('api')->group(function () {

    /** Home Requests */
    Route::get('dashboard/home', [DashboardController::class , 'home'])->name('home');

    Route::get('countries', [CountryCountroller::class , 'index'])->name('countries.index');

    Route::get('countries/{country}/cities', [CountryCountroller::class , 'cities'])->name('countries.cities');
});
