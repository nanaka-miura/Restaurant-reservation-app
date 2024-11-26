<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_name_field_is_required() {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $response->assertSessionHasErrors(['name']);
        $this->assertContains('お名前を入力してください', session()->get('errors')->get('name'));
    }

    /** @test */
    public function test_email_field_is_required() {
        $response = $this->post('/register', [
            'name' => 'テスト名前',
            'email' => '',
            'password' => 'password'
        ]);

        $response->assertSessionHasErrors(['email']);
        $this->assertContains('メールアドレスを入力してください', session()->get('errors')->get('email'));
    }

    /** @test */
    public function test_password_field_is_required() {
        $response = $this->post('/register', [
            'name' => 'テスト名前',
            'email' => 'test@example.com',
            'password' => ''
        ]);

        $response->assertSessionHasErrors(['password']);
        $this->assertContains('パスワードを入力してください', session()->get('errors')->get('password'));
    }

    /** @test */
    public function test_password_must_be_more_than_seven_characters() {
        $response = $this->post('/register', [
            'name' => 'テスト名前',
            'email' => 'test@example.com',
            'password' => 'pass123'
        ]);

        $response->assertSessionHasErrors(['password']);
        $this->assertContains('パスワードは8文字以上で入力してください', session()->get('errors')->get('password'));
    }

    public function test_successful_registration_redirects_to_login_screen() {
        $response = $this->post('/register', [
            'name' => 'テスト名前',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com'
        ]);

        $response->assertRedirect('/register');
    }
}
