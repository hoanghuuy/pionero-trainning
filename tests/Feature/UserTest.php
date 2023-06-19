<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_all_users(): void
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/users');
 
        $response->assertStatus(200);
    }
}
