<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function postCategories()
    {
        return $this->hasMany(PostCategory::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category', 'post_id', 'category_id');
    }
}
