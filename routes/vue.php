<?php

use App\Http\Controllers\Vue\DashboardController;
use Illuminate\Support\Facades\Route;

Route::name('vue.')->prefix('api')->group(function () {

    /** Home Requests */
    Route::get('dashboard/home', [DashboardController::class , 'home'])->name('home');
});
