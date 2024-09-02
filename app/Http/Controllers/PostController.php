<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Area;
use App\Models\Prefecture;
use App\Models\Image;
use App\Models\BrowsingHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    private $post;
    private $category;
    private $area;
    private $prefecture;
    private $image;
    private $browsing_history;

    public function __construct(Post $post, Category $category, Area $area, Prefecture $prefecture, Image $image, BrowsingHistory $browsing_history)
    {
        $this->post = $post;
        $this->category = $category;
        $this->area = $area;
        $this->prefecture = $prefecture;
        $this->image = $image;
        $this->browsing_history = $browsing_history;
    }

    // post.index, also top page
    public function index(Request $request)
    {
        
        if ($request->search) {
            $posts = $this->post->where('title', 'like', '%' . $request->search . '%')->paginate(4);
            $posts->appends(['search' => $request->search]);
        } elseif ($request->category) {
            $category = Category::where('name', $request->category)->first();
            if ($category) {
                $posts = $this->post->whereHas('postCategories', function ($query) use ($category) {
                    $query->where('category_id', $category->id);
                })->paginate(4);
                $posts->appends(['category' => $request->category]);
            } 
        
        } else {
            $posts = $this->post->paginate(4);
        }

        return view('posts.index')
            ->with('posts', $posts)
            ->with('search', $request->search);
    }



    // create post
    public function create()
    {
        $all_categories = $this->category->all();
        $all_areas = $this->area->all();
        $all_prefectures = $this->prefecture->all();

        return view('posts.create')->with('all_categories', $all_categories)->with('all_areas', $all_areas)->with('all_prefectures', $all_prefectures);
    }

    // post store
    public function store(Request $request)
    {
        // dd(3);
        $request->validate([
            'categories' => 'required|array|between:1,4',
            'title' => 'required|max:500',
            'article' => 'required|max:1000',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048',

        ]);

        // dd(2);

        //   post store
        $this->post->user_id = Auth::user()->id;
        // $this->post->user_id = 3;
        $this->post->title = $request->title;
        $this->post->article = $request->article;
        $this->post->visit_date = $request->visit_date;
        $this->post->start_date = $request->start_date;
        $this->post->end_date = $request->end_date;
        $this->post->prefecture_id = $request->prefecture_id;
        $this->post->area_id = $request->area_id;
        $this->post->save();

        // dd(1);

        // category
        $post_categories = [];
        foreach ($request->categories as $category_id) {
            $post_categories[] = [
                'post_id' => $this->post->id,
                'category_id' => $category_id
            ];
        }
        $this->post->postCategories()->createMany($post_categories);

        // image
        if ($request->image) {
            $img_obj = $request->image;
            $data_uri = $this->generateDataUri($img_obj);

            $this->image->post_id = $this->post->id;
            $this->image->image = $data_uri;
            $this->image->caption = $request->caption;
            $this->image->save();
        }

        return redirect()->route('posts.show');
    }

    // post edit
    public function edit($id)
    {

        $post = $this->post->findOrFail($id);
        $all_categories = $this->category->all();
        $all_areas = $this->area->all();
        $all_prefectures = $this->prefecture->all();

        #If the AUTH user is NOT the owner of the post,redirect to homepage
        // if(Auth::user()->id != $post->user->id) {
        //     return redirect()->route('index');
        // }

        $selected_categories = [];
        foreach ($post->postCategories as $post_category) {
            $selected_categories[] = $post_category->category_id;
        }

        return view('posts.edit')->with('post', $post)->with('all_categories', $all_categories)->with('selected_categories', $selected_categories)->with('all_areas', $all_areas)->with('all_prefectures', $all_prefectures);
    }

    // post update
    public function update(Request $request, $id)
    {
        $request->validate([
            'categories' => 'required|array|between:1,4',
            'title' => 'required|max:500',
            'article' => 'required|max:1000',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048',
        ]);

        $post = $this->post->findOrFail($id);
        $post->title = $request->title;
        $post->article = $request->article;
        $post->visit_date = $request->visit_date;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;
        $post->prefecture_id = $request->prefecture_id;
        $post->area_id = $request->area_id;
        $post->save();

        // image
        if ($request->image) {
            $img_obj = $request->image;
            $data_uri = $this->generateDataUri($img_obj);

            foreach ($post->images as $image) {

                $image_id = $image->id;

                $image = $this->image->findOrFail($image_id);
                $image->post_id = $post->id;
                $image->image = $data_uri;
                $image->caption = $request->caption;
                $image->save();
            }
        }

        // categories
        $post->postCategories()->delete();

        foreach ($request->categories as $category_id) {
            $post_categories[] = [
                'post_id' => $this->post->id,
                'category_id' => $category_id
            ];
        }

        $post->postCategories()->createMany($post_categories);

        return redirect()->route('posts.show', $id);
    }


    public function destroy($id)
    {
        $this->post->destroy($id);

        return redirect()->route('index');
    }


    //comments
    public function show($id)
    {
        $post = $this->post->with('comments.user')->findOrFail($id);

        $this->storeBrowsingHistory($id);

        return view('posts.show')->with('post', $post);
    }

    public function showEventNearYou()
    {
        // Temp (get all posts)
        $posts = $this->post->paginate(3);

        return view('posts.event-near-you')
            ->with('posts', $posts);
    }

    public function showCalendar(Request $request)
    {
    $date = $request->input('date', now()->format('Y-m-d'));

    $posts = Post::whereHas('postCategories', function($query) {
                     $query->where('category_id', 2);
                 })
                 ->whereDate('start_date', '<=', $date)
                 ->whereDate('end_date', '>=', $date)
                ->paginate(3); 

    return view('posts.calendar')->with('posts', $posts);
    }


     // ==== Private Functions ====
     private function generateDataUri($img_obj)
     {
         $img_extension = $img_obj->extension();
         $img_contents = file_get_contents($img_obj);
         $base64_img = base64_encode($img_contents);
 
         $data_uri = 'data:image/' . $img_extension . ';base64,' . $base64_img;
 
         return $data_uri;
     }

    private function storeBrowsingHistory($post_id) {
        $this->browsing_history->user_id = Auth::user()->id;
        $this->browsing_history->post_id = $post_id;
        $this->browsing_history->save();
    }
}