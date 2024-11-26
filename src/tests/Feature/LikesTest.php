<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;
use App\Models\Shop;

class LikesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /** @test */
    public function test_user_can_favorite_a_shop() {
        $user = User::first();
        $this->actingAs($user);

        $shop = Shop::first();
        $response = $this->post('/like/' . $shop->id);

        $this->assertDatabaseHas('likes', [
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);
    }

    /** @test */
    public function test_user_can_unfavorite_a_shop() {
        $user = User::first();
        $this->actingAs($user);

        $shop = Shop::first();
        $this->post('/like/' . $shop->id);
        $response = $this->post('/like/' . $shop->id);

        $this->assertDatabaseMissing('likes', [
            'user_id' => $user->id,
            'shop_id' => $shop->id,
        ]);
    }
}
