<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'menu' => '仙人のお寿司コース ¥10,000',
                'price' => '10000',
                'shop_id' => 1,
            ],
            [
                'menu' => '牛助の焼肉コース ¥5,000',
                'price' => '5000',
                'shop_id' => 2,
            ],
            [
                'menu' => '戦慄の飲み会コース ¥3,000',
                'price' => '3000',
                'shop_id' => 3,
            ],
            [
                'menu' => 'ルークのイタリアンコース ¥6,000',
                'price' => '6000',
                'shop_id' => 4,
            ],
            [
                'menu' => '志摩屋の人気ラーメン ¥1,000',
                'price' => '1000',
                'shop_id' => 5,
            ],
            [
                'menu' => '香の焼肉コース ¥5,000',
                'price' => '5000',
                'shop_id' => 6,
            ],
            [
                'menu' => 'JJのイタリアンコース ¥4,000',
                'price' => '4000',
                'shop_id' => 7,
            ],
            [
                'menu' => 'ラーメン極みの人気ラーメン ¥800',
                'price' => '800',
                'shop_id' => 8,
            ],
            [
                'menu' => '鳥雨の飲み会コース ¥4,000',
                'price' => '4000',
                'shop_id' => 9,
            ],
            [
                'menu' => '築地色合のお寿司コース ¥8,000',
                'price' => '8000',
                'shop_id' => 10,
            ],
            [
                'menu' => '晴海の焼肉コース ¥6,000',
                'price' => '6000',
                'shop_id' => 11,
            ],
            [
                'menu' => '三子の焼肉コース ¥5,000',
                'price' => '5000',
                'shop_id' => 12,
            ],
            [
                'menu' => '八戒の飲み会コース ¥5,000',
                'price' => '5000',
                'shop_id' => 13,
            ],
            [
                'menu' => '福助のお寿司コース ¥9,000',
                'price' => '9000',
                'shop_id' => 14,
            ],
            [
                'menu' => 'ラー北の人気ラーメン ¥1,200',
                'price' => '1200',
                'shop_id' => 15,
            ],
            [
                'menu' => '翔の飲み会コース ¥3,000',
                'price' => '3000',
                'shop_id' => 16,
            ],
            [
                'menu' => '経緯のお寿司コース ¥5,000',
                'price' => '5000',
                'shop_id' => 17,
            ],
            [
                'menu' => '漆の焼肉コース ¥7,000',
                'price' => '7000',
                'shop_id' => 18,
            ],
            [
                'menu' => 'THE TOOLのイタリアンコース ¥3,000',
                'price' => '3000',
                'shop_id' => 19,
            ],
            [
                'menu' => '木船のお寿司コース ¥12,000',
                'price' => '12000',
                'shop_id' => 20,
            ]
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert($menu);
        }
    }
}
