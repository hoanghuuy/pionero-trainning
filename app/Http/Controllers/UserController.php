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

    // [GET] /users/edit/{id}
    public function toEditPage ($id) {
        $user = DB::table('users')->where('id', $id)->get();

        return view('pages/Users/edit', ['user' => $user[0]]);
    }
    
    // [POST] /users/add
    public function add (Request $request) {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('users');
    }

    // [POST] /users/edit/{id}
    public function update (Request $request, $id) {
        $updateObject = [];
        $updateObject['name'] = $request->name;
        $updateObject['email'] = $request->email;
        if (!is_null($request->phoneNumber)) {
            $updateObject['phoneNumber'] = $request->phoneNumber;
        }

        DB::table('users')
            ->where('id', $id)
            ->update($updateObject);
            
        return redirect('users');
    }

    // [POST] /users/delete/{id}
    public function delete ($id) {
        DB::table('users')
            ->where('id', $id)
            ->delete();
            
        return redirect('users');
    }
}
