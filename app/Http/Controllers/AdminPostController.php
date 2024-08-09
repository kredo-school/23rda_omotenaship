<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index');
    }

    public function show()
    {
        return view('admin.posts.show');
    }
}

