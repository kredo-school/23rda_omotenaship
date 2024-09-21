<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User; 

class AdminUserController extends Controller
{

    public function index()
    {
        $all_profiles = Profile::paginate(10);
        
        return view('admin.users.index')->with('all_profiles', $all_profiles);
    }

    public function destroy($id) {
        $profile = Profile::findOrFail($id);
        $user = $profile->user;

        $profile->delete();
        $user->delete();

        return redirect()->back();
    }
}
