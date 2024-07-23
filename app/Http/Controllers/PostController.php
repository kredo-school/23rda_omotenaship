<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    private $post;
    private $category;

    public function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }

    public function create(){
         $all_categories = $this->category->all();

         return view('users.posts.create')->with('all_categories',$all_categories);
    }
}
