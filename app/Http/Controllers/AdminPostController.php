<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index(){

        $all_posts = Post::with('images')->paginate(5);

        return view('admin.posts.index')->with('all_posts', $all_posts);
    }

    public function show()
    {
        return view('admin.posts.show');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back();
    }
}

