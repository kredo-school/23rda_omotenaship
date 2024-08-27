<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrowsingHistoryController extends Controller
{
    public function index(){
        return view('browsing-history.index');
    }
}
