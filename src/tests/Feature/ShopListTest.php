<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\Shop;

class ShopListTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_user_can_view_all_restaurants() {
        $shops = Shop::all();

        $response = $this->get('/');

        $response->assertStatus(200);

        foreach($shops as $shop) {
            $response->assertSee($shop->name);
        }
    }
}
