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
            ['id' => 1, 'post_id' => 1, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 2, 'post_id' => 2, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 3, 'post_id' => 3, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 4, 'post_id' => 4, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 5, 'post_id' => 5, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 6, 'post_id' => 5, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 7, 'post_id' => 6, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 8, 'post_id' => 6, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 9, 'post_id' => 6, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 10, 'post_id' => 7, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 11, 'post_id' => 7, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 12, 'post_id' => 8, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 13, 'post_id' => 8, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 14, 'post_id' => 9, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 15, 'post_id' => 9, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 16, 'post_id' => 10, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 17, 'post_id' => 10, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 18, 'post_id' => 11, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 19, 'post_id' => 11, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 20, 'post_id' => 12, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 21, 'post_id' => 12, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 22, 'post_id' => 13, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 23, 'post_id' => 13, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 24, 'post_id' => 13, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 25, 'post_id' => 14, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 26, 'post_id' => 14, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 27, 'post_id' => 14, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 28, 'post_id' => 15, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 29, 'post_id' => 15, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 30, 'post_id' => 15, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 31, 'post_id' => 16, 'category_id' => 1,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 32, 'post_id' => 16, 'category_id' => 2,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 33, 'post_id' => 16, 'category_id' => 3,'created_at' => NOW(), 'updated_at' => NOW()],
            ['id' => 34, 'post_id' => 16, 'category_id' => 4,'created_at' => NOW(), 'updated_at' => NOW()],
        ];
        $this->post_category->insert($post_categories);
    }
}
