<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_email_field_is_required() {
        $response = $this->post('/login', [
            'email' => '',
            'password' => 'password'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertContains('メールアドレスを入力してください', session('errors')->get('email'));
    }

    /** @test */
    public function test_password_field_is_required() {
        $response = $this->post('/login', [
            'email' => 'user1@example.com',
            'password' => ''
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertContains('パスワードを入力してください', session('errors')->get('password'));
    }

    /** @test */
    public function test_validation_error_is_displayed_for_invalid_credentials() {
        $response = $this->post('/login', [
            'email' => 'user1@example.com',
            'password' => 'password123'
        ]);

        $response->assertSessionHasErrors();
        $this->assertContains('ログイン情報が登録されていません', session('errors')->get('email'));
    }

    /** @test */
    public function test_login_is_successful_with_correct_credentials() {
        $user = User::factory()->create([
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()
        ]);

        $response = $this->post('/login', [
            'email' => 'user1@example.com',
            'password' => 'password'
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($user);
    }
}
