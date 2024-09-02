<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    private $profile;
    private $post;

    public function __construct(
        Profile $profile,
        Post $post
    ) {
        $this->profile = $profile;
        $this->post = $post;
    }

    # Show
    public function show()
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }
        // dd($profile);

        # languages
        $languages = [
            'en' => 'English',
            'ja' => 'Japanese',
            'fr' => 'French',
            'de' => 'German',
            'zh' => 'Chinese',
            'ko' => 'Korean',
        ];
        $profile->language
            = $languages[$profile->language] ?? $profile->language;

        # pagination
        $posts = $profile->user->posts()->paginate(4);

        return view('profiles.show')
            ->with('profile', $profile)
            ->with('posts', $posts);
    }

    # Edit
    public function edit()
    {
        $profile = Auth::user()->profile;
        // dd($profile);
        return view('profiles.edit')
            ->with('profile', $profile);
    }


    # Update
    public function update(Request $request)
    {
        // dd(1);

        $request->validate([
            'first_name' => 'required|max:50',
            'avatar' => 'mimes:jpeg,jpg,gif,png|max:1048',
        ]);
        // dd(1);

        $profile = $this->profile->findOrFail(Auth::user()->id);
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->middle_name = $request->middle_name;
        $profile->language = $request->language;
        $profile->introduction = $request->introduction;

        #avatar
        if ($request->avatar) {
            $img_obj = $request->avatar;
            $data_uri = $this->generateDataUri($img_obj);

            $profile->avatar = $data_uri;
        }
        $profile->save();

        return redirect()->route('profiles.show');
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

    # Delete
    public function destroy($id)
    {
        $profile =  Profile::findOrFail($id);
        $user = $profile->user;


        $profile->delete();

        if ($user) {
            $user->delete();
        }

        return redirect()->back();
    }
}
