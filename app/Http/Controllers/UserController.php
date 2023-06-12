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

            return response()->json(['users' => $users, 'code' => Response::HTTP_OK]);
        }

        // $id is not null
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user, 'code' => Response::HTTP_OK]);
        } catch (\Exception $ex) {
            $message = $ex->getMessage();

            return response()->json(['error' => ['message' => $message, 'code' => Response::HTTP_BAD_REQUEST]]);
        }

    }

    // [GET] /users/add
    public function toAddPage () {
        return view('pages/Users/add');
    }

    // [GET] /users/edit/{id}
    public function toEditPage ($id) {
        try {
            $user = User::findOrFail($id);

            return view('pages/Users/edit', ['user' => $user]);
        } catch (\Exception $ex) {

            return view('pages/error');
        }
    }
    
    // [POST] /users
    public function add (Request $request) {
        try {
            $user = new User(array(    
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ));

        $user->save();

        return response()->json(['message' => 'Create User Successfully', Response::HTTP_OK]);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();

            return response()->json(['error' => ['message' => $message, 'code' => Response::HTTP_BAD_REQUEST]]);
        }

    }

    // [PUT] /users/{id}
    public function update (Request $request, $id) {
        try {
            $updateObject = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if (isset($request->phoneNumber)) {
                $updateObject['phoneNumber'] = $request->phoneNumber;
            }

            User::findOrFail($id)->update($updateObject);
                
            return response()->json(['message' => 'Update User Successfully', Response::HTTP_OK]);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();

            return response()->json(['error' => ['message' => $message, 'code' => Response::HTTP_BAD_REQUEST]]);
        }
    }

    // [DELETE] /users/{id}
    public function delete ($id) {
        try {

            User::findOrFail($id)->delete();  
            
            return response()->json(['message' => 'Delete User Successfully', Response::HTTP_OK]);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();

            return response()->json(['error' => ['message' => $message, 'code' => Response::HTTP_BAD_REQUEST]]);
        }    
    }
}
