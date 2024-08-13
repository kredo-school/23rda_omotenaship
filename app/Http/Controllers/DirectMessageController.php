<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectMessageController extends Controller
{
    public function show($user_id){
        return view('direct-messages.show')
        ->with('user_id',$user_id);
    }
}
