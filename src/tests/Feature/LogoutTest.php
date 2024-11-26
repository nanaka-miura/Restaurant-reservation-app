<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_can_logout() {
        $user = User::factory()->create([
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()
        ]);

        $this->actingAs($user);
        $this->assertAuthenticated();
        $response = $this->post('/logout');
        $this->assertGuest();
    }
}
