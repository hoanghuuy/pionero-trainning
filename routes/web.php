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

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// User
Route::controller(UserController::class)->prefix('users')->group(function () {
    // GET
    Route::get('/add', 'toAddPage');
    Route::get('/', 'show');

    // POST
    Route::post('/add', 'add');

    // Single User
    Route::group(['prefix' => '{id}'], function() {
        //GET
        Route::get('/edit', 'toEditPage');
        Route::get('/', 'show');

        // POST
        Route::post('/edit', 'update');
        Route::post('/delete', 'delete');
    })->where('id', '[0-9]+');
});

// Auth
Auth::routes();
