<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNgwordController extends Controller
{
    public function index(){
        return view('admin.ngwords.index');
    }
}
