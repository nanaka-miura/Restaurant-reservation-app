<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\Shop;

class ShopDetailTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_user_can_see_restaurant_name() {
        $shop = Shop::inRandomOrder()->first();

        $response = $this->get('/detail/' . $shop->id);

        $response->assertStatus(200);

        $response->assertSee($shop->name);
    }

    public function test_user_can_see_restaurant_area_and_genre() {
        $shop = Shop::inRandomOrder()->first();

        $response = $this->get('/detail/' . $shop->id);

        $response->assertStatus(200);

        $response->assertSee($shop->genre->genre, $shop->area);
    }

    public function test_user_can_see_restaurant_description() {
        $shop = Shop::inRandomOrder()->first();

        $response = $this->get('/detail/' . $shop->id);

        $response->assertStatus(200);

        $response->assertSee($shop->content);
    }
}
