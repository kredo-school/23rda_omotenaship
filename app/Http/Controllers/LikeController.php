<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    private $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    # store()/like
    // public function store($post_id)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login');
    //     }

    //     $this->like->user_id = Auth::user()->id;

    //     $this->like->post_id = $post_id;

    //     $this->like->save();

    //     return redirect()->back();
    // }

    # destroy()/unlike
    // public function destroy($post_id)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login');
    //     }
    //     $this->like->where('user_id', Auth::user()->id)
    //         ->where('post_id', $post_id)
    //         ->delete();
    //     #DELETE FROM likes WHERE user_id = Auth::user()->id AND post_id = $post_id;
    //     return redirect()->back();
    // }

    public function toggle(Request $request)
    {
        $user_id = Auth::user()->id;
        $post_id = $request->post_id;

        // Check if the user has already liked the post
        $isLiked = $this->like
            ->where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->exists();

        if ($isLiked) {
            // If the user has already liked the post, delete the like
            $this->like
                ->where('user_id', $user_id)
                ->where('post_id', $post_id)
                ->delete();
        } elseif (!$isLiked) {
            // If the user has not liked the post, create a new like
            $this->like->user_id = $user_id;
            $this->like->post_id = $post_id;
            $this->like->save();
        }

        // Get the total number of likes for the post
        $post_likes_count = $this->like
            ->where('post_id', $post_id)
            ->count();

        // Return the total number of likes for the post
        return response()
            ->json(['postLikesCount' => $post_likes_count]);
    }
}
