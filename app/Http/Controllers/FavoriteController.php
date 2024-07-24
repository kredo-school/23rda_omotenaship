<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index($user_id){
        return view('favorites.index')
        ->with('user_id',$user_id);
    }
}
