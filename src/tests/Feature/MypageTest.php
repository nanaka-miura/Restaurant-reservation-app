<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;
use App\Models\Like;
use App\Models\Shop;
use App\Models\Reservation;

class MypageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /** @test */
    public function test_user_can_see_reserved_stores_on_mypage() {
        $user = User::first();
        $this->actingAs($user);

        $reservations = Reservation::where('user_id', $user->id)->get();

        $response = $this->get('/mypage');

        foreach ($reservations as $reservation) {
            $response->assertSee($reservation->shop->name);
        }

        $response->assertStatus(200);
    }

    /** @test */
    public function test_user_can_see_liked_stores_on_mypage() {
        $user = User::first();
        $this->actingAs($user);

        $shop = Shop::first();
        $response = $this->post('/like/' . $shop->id);

        $like = Like::where('user_id', $user->id)->where('shop_id', $shop->id)->first();

        $response = $this->get('/mypage');

        $response->assertSee($like->shop->name);

        $response->assertStatus(200);
    }

    /** @test */
    public function test_user_name_is_displayed_on_mypage() {
        $user = User::first();
        $this->actingAs($user);

        $response = $this->get('/mypage');

        $response->assertSee($user->name);
        $response->assertStatus(200);
    }
}
