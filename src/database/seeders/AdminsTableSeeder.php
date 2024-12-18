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
                'id' => 1,
                'name' => '店舗代表者1',
                'email' => 'shop-admin1@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 2,
                'name' => '店舗代表者2',
                'email' => 'shop-admin2@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 3,
                'name' => '店舗代表者3',
                'email' => 'shop-admin3@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 4,
                'name' => '店舗代表者4',
                'email' => 'shop-admin4@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 5,
                'name' => '店舗代表者5',
                'email' => 'shop-admin5@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 6,
                'name' => '店舗代表者6',
                'email' => 'shop-admin6@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 7,
                'name' => '店舗代表者7',
                'email' => 'shop-admin7@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 8,
                'name' => '店舗代表者8',
                'email' => 'shop-admin8@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 9,
                'name' => '店舗代表者9',
                'email' => 'shop-admin9@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 10,
                'name' => '店舗代表者10',
                'email' => 'shop-admin10@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 11,
                'name' => '店舗代表者11',
                'email' => 'shop-admin11@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 12,
                'name' => '店舗代表者12',
                'email' => 'shop-admin12@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 13,
                'name' => '店舗代表者13',
                'email' => 'shop-admin13@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 14,
                'name' => '店舗代表者14',
                'email' => 'shop-admin14@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 15,
                'name' => '店舗代表者15',
                'email' => 'shop-admin15@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 16,
                'name' => '店舗代表者16',
                'email' => 'shop-admin16@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 17,
                'name' => '店舗代表者17',
                'email' => 'shop-admin17@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 18,
                'name' => '店舗代表者18',
                'email' => 'shop-admin18@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 19,
                'name' => '店舗代表者19',
                'email' => 'shop-admin19@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 20,
                'name' => '店舗代表者20',
                'email' => 'shop-admin20@example.com',
                'password' => bcrypt('password'),
                'shop_admin_status' => true
            ],
            [
                'id' => 21,
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
