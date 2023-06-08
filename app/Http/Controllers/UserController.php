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
            $users = User::all();
    
            return view('pages/Users/list', ['users' => $users]);
        }

        // $id is not null
        $user = User::find($id);

        // user is existed
        if (isset($user)) {
            return view('pages/Users/singleUser', ['user' => $user]);
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
        $user = User::find($id);

        return view('pages/Users/edit', ['user' => $user]);
    }
    
    // [POST] /users/add
    public function add (Request $request) {
        $user = new User(array(    
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ));

        $user->save();

        return redirect('users');
    }

    // [POST] /users/edit/{id}
    public function update (Request $request, $id) {
        $updateObject = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (isset($request->phoneNumber)) {
            $updateObject['phoneNumber'] = $request->phoneNumber;
        }

        User::find($id)->update($updateObject);
            
        return redirect('users');
    }

    // [POST] /users/delete/{id}
    public function delete ($id) {
        User::find($id)->delete();
            
        return redirect('users');
    }
}
