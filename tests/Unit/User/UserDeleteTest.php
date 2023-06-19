<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserDeleteTest extends TestCase
{
    private function get_token() : string {
        $user = User::where('email', 'test.sample@gmail.com')->first();

        $token = JWTAuth::fromUser($user);

        return $token;
    }

    public function test_delete_user_successfully(): void 
    {
        $user = User::where('name', 'Unit test sample')->orderBy('id', 'desc')->first();

        $token = $this->get_token();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson('/api/users/' . $user->id);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(['message' => 'Delete user successfully']);
    }

    public function test_delete_user_failed(): void 
    {
        $id = 9999;     // Id is not existed

        $token = $this->get_token();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson('/api/users/' . $id);

        $response
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'message'
            ]);
    }
}
