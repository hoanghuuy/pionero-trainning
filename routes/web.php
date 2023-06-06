<?php

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

$hello = "hello";

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{id}', function (string $id) {
    // Giả sử hệ thống có 5 user với id từ 1 đến 5
    // thông tin bao gồm tên, email, số điện thoại, ...
    $user1 = array("id" => 1, "name" => "Jack", "mail" => "jack99@gmail.com", "phone number" => "09999999999");
    $user2 = array(2, "Noel", "noel.hudges@gmail.com", "09999669966");
    $user3 = array(3, "York", "york-yoru@gmail.com", "099997777777");
    $user4 = array(4, "Thorfinn", "thorfinn@gmail.com", "01689999999");
    $user5 = array(5, "Luxiang", "Luxiang@gmail.com", "03869999565");

    dd($user1->id);

    return 'User '.$id;
    // Regular Expression Constraint
})->where('id', '[0-9]+');


