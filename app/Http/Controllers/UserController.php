<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    // [GET] /users/{id?}
    public function show ($id = null) {
        // $id is null
        if (is_null($id)) {
            $users = User::all();

            return response()->json(['users' => $users, Response::HTTP_OK]);
        }

        // $id is not null
        $user = User::find($id);

        // user is existed
        if (isset($user)) {

            return response()->json(['user' => $user, Response::HTTP_OK]);
        }

        // user is not existed
            return response()->json(['message' => 'User Not Found', Response::HTTP_BAD_REQUEST]);

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
    
    // [POST] /users
    public function add (Request $request) {
        $user = new User(array(    
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ));

        $user->save();

        return response()->json(['message' => 'Create User Successfully', Response::HTTP_OK]);

    }

    // [PUT] /users/{id}
    public function update (Request $request, $id) {
        $updateObject = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (isset($request->phoneNumber)) {
            $updateObject['phoneNumber'] = $request->phoneNumber;
        }

        User::find($id)->update($updateObject);
            
        return response()->json(['message' => 'Update User Successfully', Response::HTTP_OK]);
    }

    // [DELETE] /users/{id}
    public function delete ($id) {
        User::find($id)->delete();        
        
        return response()->json(['message' => 'Delete User Successfully', Response::HTTP_OK]);
    }
}
