<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    private $like;

    public function __construct(Like $like)
    {
        $this->like = $like;
    }

    # store()/like
    public function store($post_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->like->user_id = Auth::user()->id;

        $this->like->post_id = $post_id;

        $this->like->save();

        return redirect()->back();
    }

    # destroy()/unlike
    public function destroy($post_id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $this->like->where('user_id', Auth::user()->id)
            ->where('post_id', $post_id)
            ->delete();
        #DELETE FROM likes WHERE user_id = Auth::user()->id AND post_id = $post_id;
        return redirect()->back();
    }
}
