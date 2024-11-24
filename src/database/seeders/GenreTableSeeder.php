<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ['id' => 1, 'genre' => '寿司'],
            ['id' => 2, 'genre' => '焼肉'],
            ['id' => 3, 'genre' => '居酒屋'],
            ['id' => 4, 'genre' => 'イタリアン'],
            ['id' => 5, 'genre' => 'ラーメン'],
        ];

        DB::table('genres')->insert($genres);
    }
}
