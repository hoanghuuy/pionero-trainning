<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserAddTest extends TestCase
{
    private function get_token() : string {
        $user = User::where('email', 'test.sample@gmail.com')->first();

        $token = JWTAuth::fromUser($user);

        return $token;
    }

    public function test_create_user_successfully(): void 
    {
        $user = [
            'name' => 'Unit test sample',
            'email' => 'test7.create@gmail.com',                  
            'password' => '123456789',
        ];

        $token = $this->get_token();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/users/', $user);

        $response
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'id', 'email', 'name'
            ]);
    }

    public function test_create_user_failed(): void 
    { 
        $user = [
            'name' => 'Unit test sample',
            'email' => '',                          // Email field is missing
            'password' => '123456789',
        ];

        $token = $this->get_token();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/users/', $user);

        $response
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'message' => [
                    'errorInfo'
                ]
            ]);
    }
}
