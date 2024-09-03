<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = new Comment();
    }

    public function store(Request $request, $post_id)
    {   
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to add a comment.');
        }

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

    public function destroy($id)
    {
        $this->comment->destroy($id);

        return redirect()->back();
    }
}
