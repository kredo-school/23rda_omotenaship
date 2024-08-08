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

    public function index()
    {
        return view('posts.index');
    }

    public function create(){
         $all_categories = $this->category->all();

         return view('posts.create')->with('all_categories',$all_categories);
    }

    public function store(Request $request) {
         $request->validate([
            'category' => 'required|array|between:1,4',
            'title' => 'required|max:500',
            'article' => 'required|max:1000',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
            'date of visit' => '',
            'area of japan' =>'',
            'prefecture' => '',
            'event' => '',

         ]);
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function show()
    {
        return view('posts.show');
    }

    public function showEventNearYou()
    {
        return view('posts.event-near-you');
    }
}
