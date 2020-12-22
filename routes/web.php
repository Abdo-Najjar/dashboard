<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// send transactions file to js.
Route::get('js/translations.js', function () {
    $lang = config('app.locale');
    $strings = \Illuminate\Support\Facades\Cache::remember('lang_' . $lang . '.js', 23, function () use ($lang) {
        $files = [
            resource_path('lang/' . $lang . '/common.php'),
        ];
        $strings = [];

        foreach ($files as $file) {
            $name = basename($file, '.php');
            $strings[$name] = require $file;
        }

        return $strings;
    });
    \Illuminate\Support\Facades\Cache::forget('lang_' . $lang . '.js');

    header('Content-Type: text/javascript');
    echo ('window.i18n = ' . json_encode($strings) . ';');
    exit();
})->name('translations');

Route::get('lang/{diraction}', [DashboardController::class, 'setLang'])->name('lang.change');


Auth::routes();

Route::get('/register', function () {
    return redirect('/login');
});
Route::get('/password/reset', function () {
    return redirect('/login');
});

