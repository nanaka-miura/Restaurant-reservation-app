<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\Shop;
use App\Models\Genre;


class SearchTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /** @test */
    public function test_user_can_search_product_by_partial_name() {
        $shopName = Shop::inRandomOrder()->first()->name;

        $response = $this->get('/?keyword=' . urlencode($shopName));

        $response->assertStatus(200);
        $response->assertSee($shopName);
    }

    /** @test */
    public function test_user_can_search_product_by_genre() {
        $shop = Shop::inRandomOrder()->first();
        $genre = $shop->genre;

        $response = $this->get('/?genre=' . $genre->id);

        $response->assertStatus(200);
        $response->assertSee($shop->name);
    }

    /** @test */
    public function test_user_can_search_product_by_area() {
        $shop = Shop::inRandomOrder()->first();
        $area = $shop->area;

        $response = $this->get('/?area=' . $area);

        $response->assertStatus(200);
        $response->assertSee($shop->name);
    }
}
