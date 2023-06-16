<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request) {

        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|confirmed|min:6'
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
    
            $user = User::create(array_merge(
                $validator->validated(),
                ['password' => bcrypt($request->password)]
            ));
    
            return response()->json([
                'message' => 'User successfully registered!',
                'user' => $user
            ], Response::HTTP_CREATED);

        } catch (Exception $ex) {

            return response()->json([
                'message' => 'User registered failed!',
                'error' => $ex
            ]);
        }
    }
    
    public function login(Request $request) {

        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6'
            ]);
    
            if($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            if(!$token = auth()->attempt($validator->validated())) {
                return response()->json(['error' => 'Email or password is wrong'], Response::HTTP_UNAUTHORIZED);
            }

            return $this->createNewToken($token);

        } catch (Exception $ex) {

            return response()->json([
                'message' => 'Login failed!',
                'error' => $ex
            ]);
        }
    }

    protected function createNewToken($token) {
        return response()->json([
            'access_token' => $token,
            'type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL()*60*3,
            'user' => auth()->user(),
        ]);
    }
}