<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use App\Models\Category;
use App\Models\Area;
use App\Models\Prefecture;
use App\Models\Image;
use App\Models\BrowsingHistory;
use App\Models\NGWord;
use OpenAI\Laravel\Facades\OpenAI;

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
            // All posts
            $posts = $this->post->orderBy('updated_at', 'desc')->paginate(4);
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

        $prefectures_by_area = [];
        $areas = Area::all();

        foreach ($areas as $area) {
            $prefectures_by_area[$area->name] = Prefecture::where('area_id', $area->id)->get();
        }

        return view('posts.create')
            ->with('all_categories', $all_categories)
            ->with('all_areas', $all_areas)
            ->with('prefectures_by_area', $prefectures_by_area);
    }

    // post store
    public function store(Request $request)
    {






        $request->validate([
            'categories' => 'required|array|between:1,4',
            'title' => 'required|max:500',
            'article' => 'required|max:1000',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
        ]);

        // Omit NGWord
        $ng_words = NGWord::all()->pluck('word')->toArray();

        $fields = [
            'article' => $request->article,
            'title' => $request->title
        ];

        $errorMessages = [];

        foreach ($fields as $fiel => $fielname) {
            foreach ($ng_words as $ng_word) {
                if (stripos($fielname, $ng_word) !== false) {
                    $errorMessages[$fiel] = "Unfortunately, you will not be able to post because the word '{$ng_word}' is not allowed. Please change your words.";
                }
            }
        }
        if (!empty($errorMessages)) {
            return redirect()->back()
                ->withErrors($errorMessages)
                ->withInput();
        }

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

        // Set address to posts table
        $this->post->event_address = $request->event_address;

        // ==== Transform address to geocode ====
        $location = $this->geocodeAddress($request->event_address);
        // $location['longitude', 'latitude']

        // If $location is null, get prefecture's location
        if (
            $location === null &&
            !empty($request->prefecture_id)
        ) {
            $prefecture = $this->prefecture->findOrFail($request->prefecture_id);
            $location = $this->geocodeAddress($prefecture);
        }

        // Set data to post table
        if ($location !== null) {
            $this->post->event_longitude = $location['longitude'];
            $this->post->event_latitude = $location['latitude'];
        }

        // Save data to posts table
        $this->post->save();


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

        return redirect()->route('posts.show', $this->post->id);
    }

    // post edit
    public function edit($id)
    {

        $post = $this->post->findOrFail($id);
        $all_categories = $this->category->all();
        $all_areas = $this->area->all();
        // $all_prefectures = $this->prefecture->all();

        $prefectures_by_area = [];
        $areas = Area::all();

        foreach ($areas as $area) {
            $prefectures_by_area[$area->name] = Prefecture::where('area_id', $area->id)->get();
        }

        $selected_categories = [];
        foreach ($post->postCategories as $post_category) {
            $selected_categories[] = $post_category->category_id;
        }

        return view('posts.edit')
            ->with('post', $post)
            ->with('all_categories', $all_categories)
            ->with('selected_categories', $selected_categories)
            ->with('all_areas', $all_areas)
            ->with('prefectures_by_area', $prefectures_by_area);
        // ->with('all_prefectures', $all_prefectures);
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

        // Omit NGWord
        $ng_words = NGWord::all()->pluck('word')->toArray();

        $fields = [
            'article' => $request->article,
            'title' => $request->title
        ];

        $errorMessages = [];

        foreach ($fields as $fiel => $fielname) {
            foreach ($ng_words as $ng_word) {
                if (stripos($fielname, $ng_word) !== false) {
                    $errorMessages[$fiel] = "Unfortunately, you will not be able to post because the word '{$ng_word}' is not allowed. Please change your words.";
                }
            }
        }
        if (!empty($errorMessages)) {
            return redirect()->back()
                ->withErrors($errorMessages)
                ->withInput();
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

        return redirect()->route('posts.index');
    }


    //comments
    public function show($id)
    {
        $post = $this->post->with('comments.user')->findOrFail($id);

        // Only when user logging in, store history
        if (Auth::check()) {
            $this->storeBrowsingHistory($id);
        }

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

        $posts = Post::whereHas('postCategories', function ($query) {
            $query->where('category_id', 2);
        })
            ->whereDate('start_date', '<=', $date)
            ->whereDate('end_date', '>=', $date)
            ->paginate(3);

        return view('posts.calendar')->with('posts', $posts);
    }

    // ==== API ====
    public function fetchData()
    {
        $posts = $this->post->whereHas('postCategories', function ($query) {
            $query->where('category_id', 2); // Event
        })->get();

        foreach ($posts as $post) {
            $image = $post->images()->first();
            $post->image = $image; // add image property to $post
        }

        return response()->json($posts);
    }

    // Post Translation
    public function translateArticle(Request $request)
    {
        $article = $request->input('content');

        // Get language user uses
        $bcp47 = Auth::user()->profile->language;

        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => "Translate this article to {$bcp47} in BCP 47: {$article}"
                ]
            ],
        ]);

        $translated_article = $response->choices[0]->message->content;

        return response()->json([
            'translatedArticle' => $translated_article
        ]);
    }

    // ===========================
    // ==== Private Functions ====
    // ===========================
    private function generateDataUri($img_obj)
    {
        $img_extension = $img_obj->extension();
        $img_contents = file_get_contents($img_obj);
        $base64_img = base64_encode($img_contents);

        $data_uri = 'data:image/' . $img_extension . ';base64,' . $base64_img;

        return $data_uri;
    }

    private function storeBrowsingHistory($post_id)
    {
        $this->browsing_history->user_id = Auth::user()->id;
        $this->browsing_history->post_id = $post_id;
        $this->browsing_history->save();
    }

    // Transform address to geocode
    private function geocodeAddress($address)
    {
        $api_key = config('services.mapbox.api_key');
        $url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' . urlencode($address) . '.json?access_token=' . $api_key;

        $response = Http::get($url);

        if ($response->successful()) {

            $data = $response->json();

            if (isset($data['features'][0])) {
                $location = $data['features'][0]['geometry']['coordinates'];
                return [
                    'longitude' => $location[0],
                    'latitude' => $location[1],
                ];
            }
        }

        // Fail to find address
        return null;
    }
}
