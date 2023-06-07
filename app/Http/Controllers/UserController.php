<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // [GET] /users/{id?}
    public function show ($id = null) {
        // $id is null
        if (is_null($id)) {
            $users = DB::table('users')->get();
    
            return view('pages/Users/list', ['users' => $users]);
        }

        // $id is not null
        $user = DB::table('users')->where('id', $id)->get();

        // user is existed
        if (count($user) === 1) {
            return view('pages/Users/singleUser', ['user' => $user[0]]);
        }

        // user is not existed
        return view('pages/error');

    }

    // [GET] /users/add
    public function toAddPage () {
        return view('pages/Users/add');
    }
    
    // [POST] /users/add
    public function add (Request $request) {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return view('pages/Users/add');
    }

    // public function update (Request $request) {
    //     $name = $request->name;
    //     $email = $request->email;
    //     $phoneNumber = $request->phoneNumber;

    //     DB::table('users')
    //         ->where('id', Auth::id())
    //         ->update(['name' => $name, 'email' => $email, 'phoneNumber' => $phoneNumber]);
            
    //     return view('pages/Users/update');
    // }
}
