<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserUpdateTest extends TestCase
{
    
    private function get_token() : string {
        $user = User::where('email', 'test.sample@gmail.com')->first();

        $token = JWTAuth::fromUser($user);

        return $token;
    }

    public function test_update_user_successfully(): void 
    {
        $user = User::where('email', 'test.create@gmail.com')->first();

        $editValues = [
            'name' => 'Unit test sample',
            'email' => 'test.create@gmail.com',                  
            'phoneNumber' => '0182934729',
        ];

        $token = $this->get_token();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson('/api/users/' . $user->id, $editValues);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(['message' => 'Edit user successfully']);
    }

    public function test_update_user_failed(): void 
    {
        $id = User::all()->first()->id;

        $user = [
            'name' => 'Unit test sample',
            'email' => '',                          // Email field is missing
            'password' => '123456789',
        ];

        $token = $this->get_token();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson('/api/users/' . $id, $user);

        $response
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'message',
            ]);
    }
}
