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

    public function index()
    {
        $user = Auth::user();
        $posts = $user->favorites()
            ->orderBy('favorites.created_at', 'desc')
            ->paginate(6);
        // return view('favorites.index')
        //     ->with('user_id', $user_id);
        return view('favorites.index')
            ->with('posts', $posts);


    }
    // public function store(Request $request, $post_id)
    // {
    //     $user = Auth::user();


    //     $user->favorites()->attach($post_id);

    //     return redirect()->back();
    // }

    // public function destroy(Request $request, $post_id)
    // {
    //     $user = Auth::user();

    //     $user->favorites()->detach($post_id);

    //     return redirect()->back();
    // }
    // app/Http/Controllers/FavoriteController.php

    public function toggle(Request $request)
    {
        $user_id = Auth::id();  // Get authenticated user's ID
        $post_id = $request->post_id;  // Get post ID from the request

        // Check if the post is already favorited by this user
        $isFavorited = $this->favorites
            ->where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->exists();

        if ($isFavorited) {
            // If the user has already favorited the post, remove the favorite
            $this->favorites
                ->where('user_id', $user_id)
                ->where('post_id', $post_id)
                ->delete();
            return response()->json(['status' => 'removed']);
        } else {
            // If the user hasn't favorited the post yet, add a new favorite
            $this->favorites->create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);
            return response()->json(['status' => 'added']);
        }
    }



}

