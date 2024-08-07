<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index', ['navbar' => 'admin-navbar', 'footer' => 'admin-footer']);
    }

    public function show()
    {
        return view('admin.posts.show', ['navbar' => 'admin-navbar', 'footer' => 'admin-footer']);
    }
}

