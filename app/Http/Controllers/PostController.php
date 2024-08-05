<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

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
    // create post
    public function store(Request $request) {
         $request->validate([
            'category' => 'required|array|between:1,4',
            'title' => 'required|max:500',
            'article' => 'required|max:1000',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
           
         ]);
    //   post store
     $this->post->user_id = Auth::user()->id;
     $this->post->image = 'data:image/' . $request->image->extension() . ';base64,' . base64_encode(file_get_contents($request->image));
     $this->post->title = $request->title;
     $this->post->article = $request->article;
     $this->post->visit_date = $request->visit_date;
     $this->post->start_date = $request->start_date;
     $this->post->end_date = $request->end_date;
     $this->post->prefecture_id = $request->prefecture_id;
     $this->post->area_id = $request->area_id;
     $this->post->save(); 

    // category
    foreach($request->category as $category_id) {
         $category_post[] = ['category_id' => $category_id];
    }
    $this->post->PostCategory()->createMany($post_category);
    return ridirect() -> route('index');

    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function show()
    {
        return view('posts.show');
    }
}
