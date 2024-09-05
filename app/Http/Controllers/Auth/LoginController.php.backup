<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        Log::info('Login method is running');

        // get only email and password from $request
        // $credentials = $request->only('name', 'email', 'password');
        // $credentials = $request->only('name', 'email', 'password');
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Log::info('Login successful', ['user_id' => Auth::user()->id]);

            // Temp
            $auth_user = Auth::user();

            // dd($auth_user);

            // save into session
            session(['auth_user' => $auth_user]);
            session()->save();

            // get from session (test)
            $retrieved_user = session('auth_user');
            Log::info('Retrieved from session:', ['retrieved_user' => $retrieved_user]);

            // dd($retrieved_user);

            $role_id = $retrieved_user->role_id;
            // dd($role_id);
            Log::info('Retrieved $role_id from session:', ['$role_id' => $role_id]);

            return redirect()
                ->route('index');
        } else {
            Log::info('Login failed');

            return redirect()
                ->back();
        }


        // Attempt to authenticate the user
        // if (Auth::attempt($credentials)) {

        // Able to get user-id here
        // dd(Auth::user()->id);

        // dd(Auth::user(), session()->all());

        // Save the session manually
        // session()->save();
        // -> New record is created when logining so this line above is not necessary

        //     return redirect()
        //         ->route('index');
        // } else {
        //     return redirect()
        //         ->back();
        // }
    }
}
