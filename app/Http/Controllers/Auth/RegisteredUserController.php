<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Create Profile for new user
        $this->createProfile($user);

        // Login
        Auth::login($user);

        $user_logged_in = User::findOrFail(Auth::user()->id);

        if ($user_logged_in->role_id === 1) {
            return redirect('/admin/users/');
        } elseif ($user_logged_in->role_id === 2) {
            return redirect('/');
        }
    }

    // Private Functions
    private function createProfile($user)
    {
        $this->profile->user_id = $user->id;
        // $this->profile->first_name = $user->name;
        $this->profile->first_name = 'User ' . $user->id;
        $this->profile->last_name = null;
        $this->profile->middle_name = null;
        $this->profile->introduction = null;
        $this->profile->avatar = null;
        $this->profile->birth_date = null;
        $this->profile->language = 'en-US';

        $this->profile->save();
    }
}
