<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsingHistoryController extends Controller
{
    public function index($user_id){
        return view('browsing-history.index')
        ->with('user_id',$user_id);
    }
}
