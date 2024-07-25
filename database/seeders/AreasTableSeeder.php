<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    private $area;

    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['id' => 1, 'name' => 'Hokkaido', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 2, 'name' => 'Tohoku', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 3, 'name' => 'Kanto', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 4, 'name' => 'Chubu', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 5, 'name' => 'Kinki', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 6, 'name' => 'Chugoku', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 7, 'name' => 'Shikoku', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 8, 'name' => 'Kyushu', 'created_at' => NOW(), 'updated_at' => NOW()],
        ];

        $this->area->insert($areas);
    }
}
