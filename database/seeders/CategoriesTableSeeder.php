<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Review', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 2, 'name' => 'Event', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 3, 'name' => 'Volunteer', 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 4, 'name' => 'Culture', 'created_at' => NOW(), 'updated_at' => NOW()],
        ];

        $this->category->insert($categories);
    }
}
