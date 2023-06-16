<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    // [GET] /users/{id?}
    public function show($id = null) {
        try {
            // return to a single user
            if(isset($id)) {
                $users = User::findOrFail($id);

                return response()->json($users, Response::HTTP_OK);
            }

            // return to all users
            $users = User::all();

            return response()->json($users, Response::HTTP_OK);

        } catch (Exception $ex) {
            // return to an error
            return response()->json(['message' => $ex], Response::HTTP_BAD_REQUEST);
        }
    }

    // [POST] /users
    public function add(Request $request) {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return response()->json($user, Response::HTTP_CREATED);

        } catch (Exception $ex) {
            return response()->json(['message' => $ex], Response::HTTP_BAD_REQUEST);
        }
    }

    // [PUT] /users
    public function edit(Request $request, $id) {
        try {
            $user = User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
            ]);

            return response()->json($user, Response::HTTP_OK);

        } catch (Exception $ex) {
            return response()->json(['message' => $ex], Response::HTTP_BAD_REQUEST);
        }
    }

    // [PUT] /users
    public function delete($id) {
        try {
            $user = User::findOrFail($id)->delete();

            return response()->json($user, Response::HTTP_OK);

        } catch (Exception $ex) {
            return response()->json(['message' => $ex], Response::HTTP_BAD_REQUEST);
        }
    }
}
