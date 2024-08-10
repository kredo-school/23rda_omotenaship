<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NGWord;

class AdminNgwordController extends Controller
{

    protected $table = 'ng_words';
    private $ngword;

    public function __construct(NGWord $ngword) {
        $this->ngword = $ngword;
    }

    public function index(){
        $all_ngwords = NGWord::all();
        return view('admin.ngwords.index')->with('all_ngwords', $all_ngwords);
    }

    public function store(Request $request) {
        $request->validate([
            'word' => 'required|max:50|unique:ng_words'
        ]);

        $ngword = new NGWord();
        $ngword->word = $request->input('word');
        $ngword->save();
        return redirect()->back();
    }
}

