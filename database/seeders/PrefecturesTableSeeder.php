<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prefecture;

class PrefecturesTableSeeder extends Seeder
{
    private $prefecture;

    public function __construct(Prefecture $prefecture)
    {
        $this->prefecture = $prefecture;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefectures = [
            ['id' => 1, 'area_id' => 1, 'name' => 'Hokkaido', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 2, 'area_id' => 2, 'name' => 'Aomori', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 3, 'area_id' => 2, 'name' => 'Iwate', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 4, 'area_id' => 2, 'name' => 'Miyagi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 5, 'area_id' => 2, 'name' => 'Akita', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 6, 'area_id' => 2, 'name' => 'Yamagata', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 7, 'area_id' => 2, 'name' => 'Fukushima', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 8, 'area_id' => 3, 'name' => 'Ibaraki', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 9, 'area_id' => 3, 'name' => 'Tochigi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 10, 'area_id' => 3, 'name' => 'Gunma', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 11, 'area_id' => 3, 'name' => 'Saitama', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 12, 'area_id' => 3, 'name' => 'Chiba', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 13, 'area_id' => 3, 'name' => 'Tokyo', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 14, 'area_id' => 3, 'name' => 'Kanagawa', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 15, 'area_id' => 4, 'name' => 'Nigata', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 16, 'area_id' => 4, 'name' => 'Toyama', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 17, 'area_id' => 4, 'name' => 'Ishikawa', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 18, 'area_id' => 4, 'name' => 'Fukui', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 19, 'area_id' => 4, 'name' => 'Yamanashi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 20, 'area_id' => 4, 'name' => 'Nagano', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 21, 'area_id' => 4, 'name' => 'Gifu', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 22, 'area_id' => 4, 'name' => 'Shizuoka', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 23, 'area_id' => 4, 'name' => 'Aichi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 24, 'area_id' => 5, 'name' => 'Mie', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 25, 'area_id' => 5, 'name' => 'Shiga', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 26, 'area_id' => 5, 'name' => 'Kyoto', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 27, 'area_id' => 5, 'name' => 'Osaka', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 28, 'area_id' => 5, 'name' => 'Hyogo', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 29, 'area_id' => 5, 'name' => 'Nara', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 30, 'area_id' => 5, 'name' => 'Wakayama', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 31, 'area_id' => 6, 'name' => 'Tottori', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 32, 'area_id' => 6, 'name' => 'Shimane', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 33, 'area_id' => 6, 'name' => 'Okayama', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 34, 'area_id' => 6, 'name' => 'Hiroshima', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 35, 'area_id' => 6, 'name' => 'Yamaguchi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 36, 'area_id' => 7, 'name' => 'Tokushima', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 37, 'area_id' => 7, 'name' => 'Kagawa', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 38, 'area_id' => 7, 'name' => 'Ehime', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 39, 'area_id' => 7, 'name' => 'Kochi', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 40, 'area_id' => 8, 'name' => 'Fukuoka', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 41, 'area_id' => 8, 'name' => 'Saga', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 42, 'area_id' => 8, 'name' => 'Nagasaki', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 43, 'area_id' => 8, 'name' => 'Kumamoto', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 44, 'area_id' => 8, 'name' => 'Oita', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 45, 'area_id' => 8, 'name' => 'Miyazaki', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 46, 'area_id' => 8, 'name' => 'Kagoshima', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 47, 'area_id' => 8, 'name' => 'Okinawa', 'created_at' => NOW(), 'updated_at' => NOW()],
        ];

        $this->prefecture->insert($prefectures);
    }
}
