<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    private $user;
    private $profile;
    private $post;

    private static $languages;

    public function __construct(
        User $user,
        Profile $profile,
        Post $post
    ) {
        $this->user = $user;
        $this->profile = $profile;
        $this->post = $post;

        self::$languages = [
            'en-US' => 'English (US)',
            'en-GB' => 'English (UK)',
            'fr-FR' => 'French',
            'de-DE' => 'German',
            'ja-JP' => 'Japanese',
            'zh-Hans-CN' => 'Chinese (Simplified)',
            'zh-Hant-TW' => 'Chinese (Traditional)',
            'ko-KR' => 'Korean',
        ];
    }

    # Show
    public function show($user_id)
    {
        $user = $this->user->findOrFail($user_id);
        $profile = $user->profile()->first();

        if (!$profile) {
            return redirect()->back()->with('error', 'Profile not found.');
        }

        // Language list
        $languages = self::$languages;

        # pagination
        $posts = $user->posts()->paginate(4);

        return view('profiles.show', compact('user', 'profile', 'posts', 'languages'));
    }

    # Edit
    public function edit($user_id)
    {
        $user = $this->user->findOrFail($user_id);
        $profile = $user->profile()->first();

        // Language list
        $languages = self::$languages;

        return view('profiles.edit')
            ->with('profile', $profile)
            ->with('languages', $languages);
    }

    # Update
    public function update($user_id, Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'avatar' => 'mimes:jpeg,jpg,gif,png|max:1048',
        ]);

        $user = $this->user->findOrFail($user_id);
        $profile = $user->profile()->first();

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->middle_name = $request->middle_name;
        $profile->birth_date = $request->birth_date;
        $profile->language = $request->language;
        $profile->introduction = $request->introduction;

        #avatar
        if ($request->avatar) {
            $img_obj = $request->avatar;
            $data_uri = $this->generateDataUri($img_obj);

            $profile->avatar = $data_uri;
        }
        $profile->save();

        return redirect()->route('profiles.show', $user_id)
            ->with('success', 'Profile updated successfully');
    }

    //  Delete User and their profile
    public function destroy($user_id)
    {
        $user = $this->user->findOrFail($user_id);
        $user->delete();

        return redirect()->route('register');
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
