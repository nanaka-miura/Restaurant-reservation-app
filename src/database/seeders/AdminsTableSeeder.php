<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => '管理者',
                'email' => 'admin1@example.com',
                'password' => bcrypt('password'),
                'admin_status' => true
            ],
            [
                'name' => '店舗代表者',
                'email' => 'shop-admin2@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
        ];

        foreach ($admins as $admin) {
            DB::table('admins')->insert($admin);
        }
    }
}
