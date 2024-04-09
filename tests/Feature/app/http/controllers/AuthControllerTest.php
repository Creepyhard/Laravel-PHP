<?php

namespace Tests\Feature\app\http\controllers;

use App\Models\User;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    public function testUserShouldNotAuthenticateWithWrongProvider() {
        $payload = [
            'email' => 'diego@gmail.com',
            'password' => '123'
        ];
        $request = $this->post(route('authenticate', ['provider' => 'test']), $payload);

        $request->assertStatus(422);
        $request->assertJson(['errors' => ['main' => 'Wrong provider provided']]);

    }

    public function testUserShouldSendWrongPassword() {
        $user = User::factory()->create();

        dd($user);
    }
}
