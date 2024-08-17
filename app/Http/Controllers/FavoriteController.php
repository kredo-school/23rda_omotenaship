<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;
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
        $user2 = User::find(2); // IDが2のユーザーを取得
        $posts = $user2->favorites()->get();
        // return view('favorites.index')
        //     ->with('user_id', $user_id);
        return view('favorites.index', compact('posts', 'user_id'));
    }

    public function store(Request $request, $post_id)
{
    $user2 = User::find(2); // IDが2のユーザーを取得

        // お気に入りに登録
        $user2->favorites()->attach($post_id);

        return redirect()->back();
}

public function destroy(Request $request, $post_id)
{
    $user2 = User::find(2); // IDが2のユーザーを取得

        // お気に入りから削除
        $user2->favorites()->detach($post_id);

        return redirect()->back();
}


}

