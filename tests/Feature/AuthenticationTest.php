<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}
