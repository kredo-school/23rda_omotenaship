<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function store(Request $request, $post_id)
    {
        $request->validate(
            [
                'comment' => 'required|max:150'
            ],
            [
                'comment.required' => 'You cannot submit an empty comment.',
                'comment.max' => 'The comment must not have more than 150 characters.'
            ]
        );

        $commentContent = $request->input('comment');

        $this->comment->comment = $commentContent;
        $this->comment->post_id = $post_id;
        $this->comment->user_id = Auth::id();

        $this->comment->save();


        return redirect()->back();
    }
}
