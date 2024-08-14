<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile; 

class AdminUserController extends Controller
{

    public function index()
    {
        $all_profiles = Profile::all();
        
        return view('admin.users.index')->with('all_profiles', $all_profiles);
    }

    public function destroy($id) {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->back();
    }
}
