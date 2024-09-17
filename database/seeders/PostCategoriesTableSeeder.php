<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostCategory;

class PostCategoriesTableSeeder extends Seeder
{
    private $post_category;

    public function __construct(PostCategory $post_category)
    {
        $this->post_category = $post_category;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post_categories = [
            ['id' => 1, 'post_id' => 1, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 2, 'post_id' => 2, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 3, 'post_id' => 3, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 4, 'post_id' => 4, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 5, 'post_id' => 5, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 6, 'post_id' => 5, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 7, 'post_id' => 6, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 8, 'post_id' => 6, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 8, 'post_id' => 6, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 9, 'post_id' => 6, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 9, 'post_id' => 6, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 10, 'post_id' => 7, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 11, 'post_id' => 7, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 12, 'post_id' => 8, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 13, 'post_id' => 8, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 13, 'post_id' => 8, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 14, 'post_id' => 9, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 15, 'post_id' => 9, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 16, 'post_id' => 10, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 17, 'post_id' => 10, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 17, 'post_id' => 10, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 18, 'post_id' => 11, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 19, 'post_id' => 11, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 19, 'post_id' => 11, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 20, 'post_id' => 12, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 21, 'post_id' => 12, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 22, 'post_id' => 13, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 23, 'post_id' => 13, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 24, 'post_id' => 13, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 24, 'post_id' => 13, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 25, 'post_id' => 14, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 26, 'post_id' => 14, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 27, 'post_id' => 14, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 27, 'post_id' => 14, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 28, 'post_id' => 15, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 29, 'post_id' => 15, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 30, 'post_id' => 15, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 31, 'post_id' => 16, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 32, 'post_id' => 16, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 33, 'post_id' => 16, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            // ['id' => 34, 'post_id' => 16, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 34, 'post_id' => 16, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            #Add
            ['id' => 35, 'post_id' => 17, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 36, 'post_id' => 18, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 37, 'post_id' => 19, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 38, 'post_id' => 20, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 39, 'post_id' => 21, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 40, 'post_id' => 22, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 41, 'post_id' => 23, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 42, 'post_id' => 24, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 43, 'post_id' => 25, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 44, 'post_id' => 26, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 45, 'post_id' => 27, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 46, 'post_id' => 28, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 47, 'post_id' => 29, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 48, 'post_id' => 30, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 49, 'post_id' => 31, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 50, 'post_id' => 32, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 51, 'post_id' => 33, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 52, 'post_id' => 34, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 53, 'post_id' => 35, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 54, 'post_id' => 36, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 55, 'post_id' => 37, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 56, 'post_id' => 38, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 57, 'post_id' => 39, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 58, 'post_id' => 40, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 59, 'post_id' => 41, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 60, 'post_id' => 42, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 61, 'post_id' => 43, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 62, 'post_id' => 44, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 63, 'post_id' => 45, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 64, 'post_id' => 46, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 65, 'post_id' => 47, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 66, 'post_id' => 48, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 67, 'post_id' => 49, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 68, 'post_id' => 50, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 69, 'post_id' => 51, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 70, 'post_id' => 52, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 71, 'post_id' => 53, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 72, 'post_id' => 54, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 73, 'post_id' => 55, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 74, 'post_id' => 56, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 75, 'post_id' => 57, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 76, 'post_id' => 58, 'category_id' => 6, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 77, 'post_id' => 59, 'category_id' => 6, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 78, 'post_id' => 60, 'category_id' => 6, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 79, 'post_id' => 61, 'category_id' => 6, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 80, 'post_id' => 62, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 81, 'post_id' => 63, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 82, 'post_id' => 64, 'category_id' => 1, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 83, 'post_id' => 65, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 84, 'post_id' => 66, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 85, 'post_id' => 67, 'category_id' => 2, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 86, 'post_id' => 68, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 87, 'post_id' => 69, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 88, 'post_id' => 70, 'category_id' => 3, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 89, 'post_id' => 71, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 90, 'post_id' => 72, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 91, 'post_id' => 73, 'category_id' => 4, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 92, 'post_id' => 74, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 93, 'post_id' => 75, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 94, 'post_id' => 76, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 95, 'post_id' => 77, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 96, 'post_id' => 78, 'category_id' => 5, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 97, 'post_id' => 79, 'category_id' => 6, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 98, 'post_id' => 80, 'category_id' => 6, 'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 99, 'post_id' => 81, 'category_id' => 6, 'created_at' => NOW(), 'updated_at' => NOW()],
        ];

        $this->post_category->insert($post_categories);
    }
}
