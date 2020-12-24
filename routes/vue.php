<?php

use App\Http\Controllers\Vue\{CountryCountroller,DashboardController, AddressController , ServiceProviderController};
use Illuminate\Support\Facades\Route;

Route::name('vue.')->middleware('auth')->prefix('api')->group(function () {

    /** Home Requests */
    Route::get('dashboard/home', [DashboardController::class , 'home'])->name('home');

    Route::get('countries', [CountryCountroller::class , 'index'])->name('countries.index');

    Route::get('countries/{country}/cities', [CountryCountroller::class , 'cities'])->name('countries.cities');

    Route::get('addresses' , [AddressController::class , 'index'])->name('addresses.index');

    
    Route::get('serviceProviders' , [ServiceProviderController::class , 'index'])->name('serviceProviders.index');
});

