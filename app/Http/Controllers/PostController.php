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
use App\Services\GoogleTTSService;
use OpenAI\Laravel\Facades\OpenAI;

class PostController extends Controller
{
    private $post;
    private $category;
    private $area;
    private $prefecture;
    private $image;
    private $browsing_history;
    private $google_tts_service;

    public function __construct(
        Post $post,
        Category $category,
        Area $area,
        Prefecture $prefecture,
        Image $image,
        BrowsingHistory $browsing_history,
        GoogleTTSService $google_tts_service,
    ) {
        $this->post = $post;
        $this->category = $category;
        $this->area = $area;
        $this->prefecture = $prefecture;
        $this->image = $image;
        $this->browsing_history = $browsing_history;
        $this->google_tts_service = $google_tts_service;
    }

    // posts.index, also top page
    public function index(Request $request)
    {
        if (
            !$request->search &&
            !$request->category
        ) {
            // All posts
            $all_posts = $this->post->orderBy('updated_at', 'desc')->paginate(10);
        } elseif ($request->search) {
            // Searched posts
            $searched_posts = $this->post
                ->where('title', 'like', '%' . $request->search . '%')
                ->paginate(4)
                ->appends(['search' => $request->search]);
        } elseif ($request->category) {
            // Get category record
            $category = Category::where('name', $request->category)->first();

            // Recommended posts
            $recommended_posts = $this->post
                ->whereHas('postCategories', function ($query) use ($category) {
                    if ($category->name === 'Event') {
                        $query->whereIn('category_id', [2, 5]); // Event or Event Organizer
                    } elseif ($category->name === 'Volunteer') {
                        $query->whereIn('category_id', [3, 6]); // Volunteer or Volunteer Organizer
                    }
                })
                // Order by the latest updated_at
                ->orderByDesc('updated_at')
                // Order by the number of likes
                ->orderByDesc(function ($query) {
                    $query
                        ->selectRaw('count(*)')
                        ->from('likes')
                        ->whereColumn('likes.post_id', 'posts.id');
                })
                ->paginate(4)
                ->appends(['category' => $request->category]);

            // If the category is 'Event' or 'Volunteer'
            if (
                $category->name === 'Event' ||
                $category->name === 'Volunteer'
            ) {
                // Upcoming posts
                $upcoming_posts = $this->post
                    ->where('end_date', '>=', now()->toDateString())
                    ->whereHas('postCategories', function ($query) use ($category) {
                        if ($category->name === 'Event') {
                            $query->whereIn('category_id', [5]); // Event Organizer
                        } elseif ($category->name === 'Volunteer') {
                            $query->whereIn('category_id', [6]); // Volunteer Organizer
                        }
                    })->orderBy('end_date', 'asc')
                    ->paginate(4)
                    ->appends(['category' => $request->category]);

                // Ended posts
                $ended_posts = $this->post
                    ->where('end_date', '<', now()->toDateString())
                    ->whereHas('postCategories', function ($query) use ($category) {
                        if ($category->name === 'Event') {
                            $query->whereIn('category_id', [5]); // Event Organizer
                        } elseif ($category->name === 'Volunteer') {
                            $query->whereIn('category_id', [6]); // Volunteer Organizer
                        }
                    })->orderBy('end_date', 'desc')
                    ->paginate(4)
                    ->appends(['category' => $request->category]);
            }

            // If the category is 'Review' or 'Culture'
            if (
                $category->name === 'Review' ||
                $category->name === 'Culture'
            ) {
                // Latest posts
                $latest_posts = $this->post
                    ->whereHas('postCategories', function ($query) use ($category) {
                        if ($category->name === 'Review') {
                            $query->whereIn('category_id', [1]); // Review
                        } elseif ($category->name === 'Culture') {
                            $query->whereIn('category_id', [4]); // Culture
                        }
                    })
                    // Order by the latest updated_at
                    ->orderByDesc('updated_at')
                    ->paginate(4)
                    ->appends(['category' => $request->category]);
            }
        }

        // Return view
        if (
            !$request->search &&
            !$request->category
        ) {
            return view('posts.index')
                ->with('all_posts', $all_posts);
        } elseif ($request->search) {
            return view('posts.index')
                ->with('searched_posts', $searched_posts)
                ->with('search', $request->search);
        } elseif ($request->category) {
            if (
                $category->name === 'Event' ||
                $category->name === 'Volunteer'
            ) {
                return view('posts.index')
                    ->with('recommended_posts', $recommended_posts)
                    ->with('upcoming_posts', $upcoming_posts)
                    ->with('ended_posts', $ended_posts);
            } elseif (
                $category->name === 'Review' ||
                $category->name === 'Culture'
            ) {
                return view('posts.index')
                    ->with('recommended_posts', $recommended_posts)
                    ->with('latest_posts', $latest_posts);
            }
        }
    }

    public function loadMorePosts(Request $request)
    {
        $all_posts = $this->post->orderBy('updated_at', 'desc')
            ->paginate(10);

        $views = [];
        foreach ($all_posts as $post) {
            $view = view('components.post', compact('post'))->render();
            $views[] = $view;
        }

        return response()->json([
            'html' => $views,
            'hasMore' => $all_posts->hasMorePages(),
        ]);
    }

    public function show($id)
    {
        // with comments
        $post = $this->post->with('comments.user')->findOrFail($id);

        // Only when user logging in, store history
        if (Auth::check()) {
            $this->storeBrowsingHistory($id);
        }

        return view('posts.show')->with('post', $post);
    }

    public function selectCategory()
    {
        return view('posts.select-category');
    }

    // create post
    public function create(Request $request)
    {
        // Get $category_id
        $selected_category_id = $request->category_id;
        $selected_category = $this->category->findOrFail($selected_category_id);
        $selected_category_name = $selected_category->name;

        $all_categories = $this->category->all();
        $all_areas = $this->area->all();

        $prefectures_by_area = [];
        $areas = Area::all();

        foreach ($areas as $area) {
            $prefectures_by_area[$area->name] = Prefecture::where('area_id', $area->id)->get();
        }

        return view('posts.create')
            ->with('selected_category_id', $selected_category_id)
            ->with('selected_category_name', $selected_category_name)
            ->with('all_categories', $all_categories)
            ->with('all_areas', $all_areas)
            ->with('prefectures_by_area', $prefectures_by_area);
    }

    public function store(Request $request)
    {
        // ==== Omit NGWord ====
        $error_messages = [];
        $error_messages['title'] = $this->omitNGWord($request->title);
        $error_messages['article'] = $this->omitNGWord($request->article);
        if (
            !is_null($error_messages['title']) ||
            !is_null($error_messages['article'])
        ) {
            return redirect()->back()
                ->withErrors($error_messages)
                ->withInput();
        }
        // =======================

        // ==== Validation ====
        $this->validatePost($request);
        // =====================

        // ==== Post ====
        $this->post->user_id = Auth::user()->id;
        $this->post->title = $request->title;
        $this->post->article = $request->article;
        $this->post->visit_date = $request->visit_date;
        $this->post->start_date = $request->start_date;
        $this->post->end_date = $request->end_date;
        $this->post->prefecture_id = $request->prefecture_id;
        $this->post->area_id = $request->area_id;
        $this->post->event_address = $request->event_address;



        if ($request->event_address) {
            // Get location from address
            $location = $this->geocodeAddress($request->event_address); // $location['longitude', 'latitude']
        } elseif (!empty($request->prefecture_id)) {
            // Get location from prefecture
            $prefecture = $this->prefecture->findOrFail($request->prefecture_id);
            $location = $this->geocodeAddress($prefecture->name);
        } else {
            $location = null;
        }

        // Set data to post table
        if ($location !== null) {
            $this->post->event_longitude = $location['longitude'];
            $this->post->event_latitude = $location['latitude'];
        }

        $this->post->save();
        // ===============

        // ==== Category ====
        // Save one category ID onto post_category table
        $post_categories = [];

        $post_categories[] = [
            'post_id' => $this->post->id,
            'category_id' => $request->category_id,
        ];

        // Loop just once
        // foreach ($request->categories as $category_id) {
        // $post_categories[] = [
        //     'post_id' => $this->post->id,
        //     'category_id' => $category_id
        // ];
        // }
        $this->post->postCategories()->createMany($post_categories);
        // ==================

        // ==== Image ====
        if ($request->image) {
            $img_obj = $request->image;
            $data_uri = $this->generateDataUri($img_obj);

            $this->image->post_id = $this->post->id;
            $this->image->image = $data_uri;
            $this->image->caption = $request->caption;

            $this->image->save();
        }
        // ===============

        return redirect()->route('posts.show', $this->post->id);
    }

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

        // ==== Get the category ID and name from the post ====
        // Only loop once (to get the only one category ID from pivot table)
        foreach ($post->postCategories as $post_category) {
            $category_id = $post_category->category_id;
        }
        $category_name = $this->category->findOrFail($category_id)->name;
        // ===================================================

        return view('posts.edit')
            ->with('post', $post)
            ->with('all_categories', $all_categories)
            ->with('category_id', $category_id)
            ->with('category_name', $category_name)
            ->with('all_areas', $all_areas)
            ->with('prefectures_by_area', $prefectures_by_area);
        // ->with('all_prefectures', $all_prefectures);
    }

    // post update
    public function update(Request $request, $id)
    {
        // ==== Omit NGWord ====
        $error_messages = [];

        // check if the title has NGWord
        $error_messages['title'] = $this->omitNGWord($request->title);

        // check if the article has NGWord
        $error_messages['article'] = $this->omitNGWord($request->article);

        // if either title or article has NGWord, return error message
        if (
            !is_null($error_messages['title']) ||
            !is_null($error_messages['article'])
        ) {
            return redirect()->back()
                ->withErrors($error_messages)
                ->withInput();
        }
        // =======================

        // ==== Validation ====
        $this->validatePost($request);
        // =====================

        // ==== Post ====
        $post = $this->post->findOrFail($id);

        $post->title = $request->title;
        $post->article = $request->article;
        $post->visit_date = $request->visit_date;
        $post->prefecture_id = $request->prefecture_id;
        $post->event_address = $request->event_address;
        $post->start_date = $request->start_date;
        $post->end_date = $request->end_date;

        if ($request->event_address) {
            // Get location from address
            $location = $this->geocodeAddress($request->event_address); // $location['longitude', 'latitude']
        } elseif (!empty($request->prefecture_id)) {
            // Get location from prefecture
            $prefecture = $this->prefecture->findOrFail($request->prefecture_id);
            $location = $this->geocodeAddress($prefecture->name);
        } else {
            $location = null;
        }

        // Set data to post table
        if ($location !== null) {
            $post->event_longitude = $location['longitude'];
            $post->event_latitude = $location['latitude'];
        }

        $post->save();
        // ===============

        // ==== Categories ====
        // ==== Save one category ID onto post_category table ====
        $post->postCategories()->delete();
        $post_categories[] = [
            'post_id' => $post->id,
            'category_id' => (int)$request->category_id,
        ];
        $post->postCategories()->createMany($post_categories);
        // ======================================================

        // ==== Image ====
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
        // ===============

        return redirect()->route('posts.show', $id);
    }

    public function destroy($id)
    {
        $post = $this->post->findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');
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
            $query->whereIn('category_id', [2, 5]); // Event and Event Organizer
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
        $language = $bcp47;

        return response()->json([
            'translatedArticle' => $translated_article,
            'language' => $language
        ]);
    }

    // Post Read Aloud
    public function generateAudioUrl(Request $request)
    {
        $article = $request->input('article');
        $language = $request->input('language');

        // get URL from TTS service
        $audio_url = $this->google_tts_service->convertTextToSpeech($article, $language);

        return response()->json(['audioUrl' => $audio_url]);
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
        // === Mapbox API ====
        // $api_key = config('services.mapbox.api_key');
        // $url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' . urlencode($address) . '.json?access_token=' . $api_key;

        // $response = Http::get($url);

        // if ($response->successful()) {

        //     $data = $response->json();

        //     if (isset($data['features'][0])) {
        //         $location = $data['features'][0]['geometry']['coordinates'];
        //         return [
        //             'longitude' => $location[0],
        //             'latitude' => $location[1],
        //         ];
        //     }
        // }
        // ===================

        // === Google Maps API ====
        $api_key = config('services.google_maps.api_key');
        $url = 'https://maps.googleapis.com/maps/api/geocode/json';

        // Get location from Google Maps API
        $response = Http::get(
            $url,
            [
                'address' => $address,
                'key' => $api_key,
            ]
        );
        $data = $response->json();

        // If the response has results
        if (isset($data['results'][0])) {
            $location = $data['results'][0]['geometry']['location'];

            return [
                'latitude' => $location['lat'],
                'longitude' => $location['lng'],
            ];
        }
        // =========================

        // Fail to find address
        return null;
    }

    private function omitNGWord($text)
    {
        $ng_words = NGWord::all()->pluck('word')->toArray();

        foreach ($ng_words as $ng_word) {
            // Remove special characters
            $text = preg_replace('/[^\p{L}\p{N}\s]/u', '', $text);

            // Split the text into words
            $words = preg_split('/\s+/', $text);

            foreach ($words as $word) {
                // Check if the word is NGWord
                // If it is, return error message
                if (strtolower($word) === strtolower($ng_word)) {
                    // if (stripos($word,$ng_word) !== false) {
                    $error_message = "Your post contains the word '{$word}'. Please change it.";
                    break;
                }
            }
        }

        // If the text has NGWord, return error message
        if (!empty($error_message)) {
            return $error_message;
        }

        return null;
    }

    private function validatePost(Request $request)
    {
        // Get category ID
        $category_id = $request->category_id;

        // Validation rules
        $rules = [
            'title' => 'required|max:255',
            'article' => 'required|max:10000',
        ];
        // If the route is 'posts.store'
        if ($request->routeIs('posts.store')) {
            $rules += [
                'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
            ];
        }
        // If the category is 'Event'
        if ($category_id == 2) {
            $rules += [
                'prefecture_id' => 'required',
            ];
        }
        // If the category is 'Event Organizer'
        if ($category_id == 5) {
            $rules += [
                'prefecture_id' => 'required',
                'event_address' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ];
        }
        // If the category is 'Volunteer Organizer'
        if ($category_id == 6) {
            $rules += [
                'start_date' => 'required',
                'end_date' => 'required',
            ];
        }

        $request->validate($rules);
    }
}
