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

    public function store($post_id)
    {
        $this->favorites->user_id = Auth::user()->id;
        $this->favorites->post_id = $post_id;
        $this->favorites->save();

        return redirect()->back();
    }

}

