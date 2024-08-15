<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Area;
use App\Models\Prefecture;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private $post;
    private $category;
    private $area;
    private $prefecture;
    private $image;

    public function __construct(Post $post, Category $category, Area $area, Prefecture $prefecture, Image $image)
    {
        $this->post = $post;
        $this->category = $category;
        $this->area = $area;
        $this->prefecture = $prefecture;
        $this->image = $image;
    }

    public function index()
    {
        return view('posts.index');
    }

    public function create()
    {
        $all_categories = $this->category->all();
        $all_areas = $this->area->all();
        $all_prefectures = $this->prefecture->all();

        return view('posts.create')->with('all_categories', $all_categories)->with('all_areas', $all_areas)->with('all_prefectures', $all_prefectures);
    }

    // create post
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
        // $this->post->user_id = Auth::user()->id;
        $this->post->user_id = 3;
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

    public function edit()
    {
        return view('posts.edit');
    }

    public function show($id)
    {
        $post = $this->post->findOrFail($id);
        //  dd($post->user->getAttributes());
        return view('posts.show')->with('post', $post);
    }

    public function showEventNearYou()
    {
        return view('posts.event-near-you');
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
}
