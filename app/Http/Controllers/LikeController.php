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

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        $post = Post::findOrFail($post_id);

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }
}
