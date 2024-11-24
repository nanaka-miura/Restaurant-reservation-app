<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = DB::table('users')->pluck('id');
        $shopIds = DB::table('shops')->pluck('id');

        $startDate = strtotime('2024-01-01');
        $endDate = strtotime('2024-12-31');

        $reservations = [];

        for ($i = 0; $i < 30; $i++) {
            $randomTimestamp = rand($startDate, $endDate);
            $randomDate = date('Y-m-d', $randomTimestamp);

            $reservations[] = [
                'user_id' => $userIds->random(),
                'shop_id' => $shopIds->random(),
                'date' => $randomDate,
                'time' => collect(['17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30', '21:00', '21:30', '22:00'])->random(),
                'number' => collect(['1人', '2人', '3人', '4人', '5人', '6人', '7人', '8人', '9人', '10人'])->random(),
            ];
        }

        foreach ($reservations as $reservation) {
            DB::table('reservations')->insert($reservation);
        }
    }
}