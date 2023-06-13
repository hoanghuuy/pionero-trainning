<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(UserController::class)->prefix('users')->group(function() {
    // get all users/ single user
    Route::get('/{id?}', 'show');

    // add an user
    Route::post('/', 'add');

    // edit an user
    Route::put('/{id}', 'edit');

    // delete an user
    Route::delete('/{id}', 'delete');
});