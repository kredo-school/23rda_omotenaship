<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    private $favorites;

    public function __construct(Favorite $favorites)
    {
        $this->favorites = $favorites;
    }

    public function index($user_id)
    {
        return view('favorites.index')
            ->with('user_id', $user_id);
    }

    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $postId = $request->input('post_id');
    
        $this->favorites->user_id = $userId;
        $this->favorites->post_id = $postId;
        $this->favorites->save();
    
        return redirect()->back();
    }

}

