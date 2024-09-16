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

    public function show($id) {
        $inquire = Contact::findOrFail($id);

        return view('admin.inquires.show')->with('inquire', $inquire);
    }

    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'content' => 'required|string',
    ]);

    $inquire = Contact::findOrFail($id);
    $inquire->update($validatedData);

    return redirect()->route('admin.inquires.index')->with('success', 'Inquiry updated successfully.');
    }

    public function destroy($id)
    {
        $inquire = Contact::findOrFail($id);
        $inquire->delete();

        return redirect()->back();
    }
}
