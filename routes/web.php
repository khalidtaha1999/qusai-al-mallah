<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KnowledgeCenterController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
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
    Route::get('/', HomeController::class);
    Route::get('/about-us', AboutUsController::class);
    Route::get('/services', ServiceController::class);
    Route::get('/our-team', OurTeamController::class);
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/{slug}', [BlogController::class, 'show']);
    Route::get('/contact-us', ContactUsController::class);
    Route::get('/projects/{slug}', [ProjectController::class, 'show']);
    Route::get('/knowledge-center', [KnowledgeCenterController::class, 'index']);
    Route::get('/knowledge-center/{id}', [KnowledgeCenterController::class, 'show']);
    Route::get('/download/file/{file}', [KnowledgeCenterController::class, 'download']);

    Route::get('/projects', [ProjectController::class, 'index']);
});


require __DIR__ . '/auth.php';
