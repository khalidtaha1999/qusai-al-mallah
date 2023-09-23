<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/',HomeController::class);
    Route::get('/about-us', AboutUsController::class);
});


require __DIR__ . '/auth.php';
