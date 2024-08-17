<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    private $profile;
    private $post;

    public function __construct(
        Profile $profile,
        Post $post
    ) {
        $this->profile = $profile;
        $this->post = $post;
    }

    public function show()
    {
        $profile = $this->profile->where('user_id', 2)->first();
        // dd($profile);
        // $profile = Auth::user()->profile;  ←Auth

        $posts = $profile->user->posts()->paginate(2);

        return view('profiles.show')
            ->with('profile', $profile)
            ->with('posts', $posts);
    }

    public function edit($id)
    {
        return view('profiles.edit')
            ->with('user_id', $id);
    }
}
