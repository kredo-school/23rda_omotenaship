<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\BrowsingHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrowsingHistoryController extends Controller
{
    // private $post;

    // public function __construct(Post $post)
    // {
    //     $this->post = $post;
    // }

    public function index()
    {
    $browsingHistories = BrowsingHistory::where('user_id', Auth::id())
        ->select('post_id', DB::raw('MAX(created_at) as latest_viewed'))
        ->groupBy('post_id')
        ->with(['post']) 
        ->orderBy('latest_viewed', 'desc') 
        ->paginate(6);

    return view('browsing-history.index')
        ->with('browsingHistories', $browsingHistories);
    }

}

