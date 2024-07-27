<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(/*$id*/) {
        return view('profiles.show')
        /*->with('id',$id)*/; 
    }
    public function edit(/*$id*/) {
        return view('profiles.show')
        /*->with('id',$id)*/; 
    }
}
