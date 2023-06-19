<?php

namespace Tests\Unit\User;

// use Illuminate\Support\Facades\Http;

use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserShowTest extends TestCase
{
    private function get_token() : string {
        $user = User::where('email', 'test.sample@gmail.com')->first();

        $token = JWTAuth::fromUser($user);

        return $token;
    }
    
    public function test_get_all_users(): void
    {
        $token = $this->get_token();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/users');

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonIsArray()
            ->assertJsonStructure([
                '*' => ['id', 'email', 'name', 'phoneNumber',]
            ]);
 
    }
    
    public function test_get_single_user(): void
    {
        $token = $this->get_token();

        $user = User::all()->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/users/' . $user->id);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'id', 'email', 'name', 'phoneNumber',
            ]);
           
    }
    
    public function test_get_an_non_existed_user(): void
    {
        $token = $this->get_token();

        $id = 9999; // Id is not existed

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson('/api/users/' . $id);

        $response
            ->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJsonStructure([
                'message',
            ]);
           
    }


}
