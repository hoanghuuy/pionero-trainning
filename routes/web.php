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
    Route::get('/add', 'toAddPage'); // go to add page
    Route::get('/', 'show');

    // POST
    Route::post('/', 'add');

    // Single User
    Route::group(['prefix' => '{id}'], function($group) {
        //GET
        Route::get('/edit', 'toEditPage'); // go to edit page
        Route::get('/', 'show');

        // PUT
        Route::put('/', 'update');

        // DELETE
        Route::delete('/', 'delete');

        foreach($group->getRoutes() as $route){
            $route->where('id', '[0-9]+');
        }
    });
});

// Auth
Auth::routes();
