<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityTest extends TestCase
{
    public function test_add_city(): void
    {
        $response = $this->postJson ('api/auth/login', [
            'email' => 'test@example.com',
            'password' => '123456',
        ]);

        $this->assertTrue(isset($response['access_token']));

        $response = $this->postJson('api/add_city?token=' . $response['access_token'], [
            'name' => 'Ulan-Ude',
        ]);

        $response->assertStatus(200);
    }
}
