<?php

use Illuminate\Support\Facades\Route;
include("../helper/userClass.php");

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/{id?}', function ($id = null) { // truy cập được /users/{id} & /users
    // Giả sử hệ thống có 5 user với id từ 1 đến 5
    $users = array();
    array_push(
        $users, 
        new User(1, "Martin", "king-martin@gmail.com", "09999669966"),
        new User(2, "Daniel", "daniel007@gmail.com", "01685743333"),
        new User(3, "Robert", "robert.watterson@gmail.com", "03869669966"),
        new User(4, "Jack", "jack99@gmail.com", "0168450835"),
        new User(5, "Olivia", "hero-olivia@gmail.com", "09999669966"),
    );

    // [GET] /users/{id} - trả về thông tin 1 user
    foreach ($users as $user) {
        if ($user->id == $id) {
            return view('user', ['users' => [$user]]);
        }
    }

    // [GET] /users - trả về thông tin tất cả user
    return view('user', ['users' => $users]);

    // Regular Expression Constraint 
})->where('id', '[0-9]+');


