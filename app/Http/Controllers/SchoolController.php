<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('pages.schools', compact('schools'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'district' => 'required',
            'registration_number' => 'required',
            'email' => 'required|email',
            'representative' => 'required',
        ]);

        School::create($request->all());
        return redirect()->route('schools');
    }
}
