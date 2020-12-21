<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('test' , function(){
//     return response()->json(['message'=>'success']);
// })->name('test');



Route::get('admin/home', [DashboardController::class , 'home'])->name('home');
