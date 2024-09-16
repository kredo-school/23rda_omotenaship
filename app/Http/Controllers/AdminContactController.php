<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
    protected $table = 'all_inquires';

    public function index()
    {
        $all_inquires = Contact::paginate(5);
        return view('admin.inquires.index')->with('all_inquires', $all_inquires);
    }
}
