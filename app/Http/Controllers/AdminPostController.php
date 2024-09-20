<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;

class AdminPostController extends Controller
{
    public function index()
    {
        $all_posts = Post::with(['images', 'user'])->paginate(5);

        return view('admin.posts.index')->with('all_posts', $all_posts);
    }

    public function show($id)
    {
        $post = Post::with(['images', 'user'])->findOrFail($id);

        return view('admin.posts.show')->with('post', $post);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back();
    }

    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back();
    }
}

