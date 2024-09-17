<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DirectMessageController extends Controller
{
    public function index()
    {
        return view('direct-messages.index');
    }
    public function show($user_id)
    {
        return view('direct-messages.show')
            ->with('user_id', $user_id);
    }
}
