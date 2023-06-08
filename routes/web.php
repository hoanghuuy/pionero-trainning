<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::controller(UserController::class)->group(function () {
    Route::prefix('users')->group(function () {
        // get
        Route::get('/add', 'toAddPage');
        Route::get('/edit/{id}', 'toEditPage');
        Route::get('/{id?}', 'show')->where('id', '[0-9]+');

        // post
        Route::post('/add', 'add');
        Route::post('/edit/{id}', 'update');
        Route::post('/delete/{id}', 'delete');
    });
});


Auth::routes();
