<?php

namespace Tests\Unit\Auth;

use Tests\TestCase;
use Illuminate\Http\Response;

class RegisterTest extends TestCase
{
    public function test_register_success(): void
    {
        $user = [
            'name' => 'Unit test sample',
            'email' => 'test10.sample@gmail.com',
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ];

        $response = $this->postJson('/api/auth/register', $user);

        // remove 2 fields: password & password_confirmation
        array_splice($user,2,2);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJson([
                'message' => 'User successfully registered!',
                'user' => $user,
            ]);

        $this->assertDatabaseHas('users', $user);
    }
    
    public function test_register_validation_fails(): void
    {
        $user = [
            'name' => 'Unit test sample',
            'email' => '',                          // Email field is missing
            'password' => '123456789',
            'password_confirmation' => '123456789',
        ];

        $response = $this->postJson('/api/auth/register', $user);

        $response
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'error' => [
                    "email" => ["The email field is required."]
                ]
            ]);

    }
}
