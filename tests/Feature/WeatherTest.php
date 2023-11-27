<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * Test Login
     *
     * @return string
     */
    public function test_login(): string
    {
        $response = $this->postJson ('api/auth/login', [
            'email' => 'test@example.com',
            'password' => '123456',
        ]);

        $this->assertTrue(isset($response['access_token']));

        return $response['access_token'];
    }
}
