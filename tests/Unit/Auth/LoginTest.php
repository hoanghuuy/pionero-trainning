<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Http\Response;

class LoginTest extends TestCase
{
    public function test_login_success(): void
    {
        $user = [
            'email' => 'test.sample@gmail.com',
            'password' => '123456789',
        ];

        $response = $this->postJson('/api/auth/login', $user);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'access_token', 'type', 'expires_in', 'user',
            ]);

    }

    public function test_login_validation_fails(): void
    {
        $user = [
            'email' => '',              // Email field is missing
            'password' => '123456789',
        ];

        $response = $this->postJson('/api/auth/login', $user);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'error' => [
                    "email" => ["The email field is required."]
                ]
            ]);
    }
}
