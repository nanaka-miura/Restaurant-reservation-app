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
                'name' => '店舗代表者1',
                'email' => 'shop-admin1@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者2',
                'email' => 'shop-admin2@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者3',
                'email' => 'shop-admin3@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者4',
                'email' => 'shop-admin4@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者5',
                'email' => 'shop-admin5@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者6',
                'email' => 'shop-admin6@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者7',
                'email' => 'shop-admin7@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者8',
                'email' => 'shop-admin8@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者9',
                'email' => 'shop-admin9@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者10',
                'email' => 'shop-admin10@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者11',
                'email' => 'shop-admin11@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者12',
                'email' => 'shop-admin12@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者13',
                'email' => 'shop-admin13@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者14',
                'email' => 'shop-admin14@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者15',
                'email' => 'shop-admin15@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者16',
                'email' => 'shop-admin16@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者17',
                'email' => 'shop-admin17@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者18',
                'email' => 'shop-admin18@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者19',
                'email' => 'shop-admin19@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '店舗代表者20',
                'email' => 'shop-admin20@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'name' => '管理者',
                'email' => 'admin1@example.com',
                'password' => bcrypt('password'),
                'admin_status' => true
            ],
        ];

        foreach ($admins as $admin) {
            DB::table('admins')->insert($admin);
        }
    }
}
