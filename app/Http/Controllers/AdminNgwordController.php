<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NGWord;
use Illuminate\Support\Facades\Auth;

class AdminNgwordController extends Controller
{

    protected $table = 'ng_words';

    public function index()
    {
        $all_ngwords = NGWord::paginate(10);
        return view('admin.ngwords.index')->with('all_ngwords', $all_ngwords);
    }

    public function store(Request $request)
    {
        $request->validate([
            'word' => 'required|max:50|unique:ng_words'
        ]);

        $ng_word = new NGWord();
        $ng_word->word = $request->input('word');
        $ng_word->user_id = Auth::id();
        $ng_word->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $ng_word = NGWord::findOrFail($id);
        $ng_word->delete();

        return redirect()->back();
    }
}

