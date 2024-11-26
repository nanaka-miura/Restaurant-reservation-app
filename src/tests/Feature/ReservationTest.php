<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;
use App\Models\User;
use App\Models\Shop;
use App\Models\Menu;
use App\Models\Reservation;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /** @test */
    public function test_user_can_make_reservation_when_all_fields_are_filled() {
        $user = User::first();
        $this->actingAs($user);

        $shop = Shop::first();

        $response = $this->post('/detail/' . $shop->id, [
            'date' => '2024-12-31',
            'time' => '17:00',
            'number' => '4人',
            'menu_id' => 1
        ]);

        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'date' => '2024-12-31',
            'time' => '17:00:00',
            'number' => '4人',
            'menu_id' => 1
        ]);
    }

    /** @test */
    public function test_user_can_cancel_reservation() {
        $user = User::first();
        $this->actingAs($user);

        $shop = Shop::first();
        $menu = Menu::where('shop_id', $shop->id)->first();

        $reservation = Reservation::create([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'menu_id' => $menu->id,
            'date' => '2024-12-31',
            'time' => '17:00',
            'number' => '4人',
        ]);

        $response = $this->post('/cancel/' . $reservation->id);

        $this->assertDatabaseMissing('reservations', [
            'id' => $reservation->id
        ]);
    }
}
