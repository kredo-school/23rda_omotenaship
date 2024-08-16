<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;


class ProfileController extends Controller
{
    private $profile;

    public function __construct(Profile $profile) {
        $this->profile = $profile;
    }

    public function show($id)
    {
        $profile = $this->profile->findOrFail($id);

        return view('profiles.show')
        ->with('profile', $profile);
    }

    public function edit($id)
    {
        return view('profiles.edit')
            ->with('user_id', $id);
    }
}
