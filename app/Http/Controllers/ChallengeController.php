<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Support\Facades\Log;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenges = Challenge::all();
        return view('pages.challenges', compact('challenges'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'duration' => 'required|integer',
            'number_of_questions' => 'required|integer',
        ]);

      
        Log::info('Store Challenge Request Data:', $request->all());

        $challenge = new Challenge([
            'name' => $request->get('name'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'duration' => $request->get('duration'),
            'number_of_questions' => $request->get('number_of_questions'),
        ]);


        try {
            $challenge->save();
            Log::info('Challenge saved successfully:', $challenge->toArray());

            // Redirect to the challenges page with a success message
            return redirect()->route('challenges')->with('success', 'Challenge created successfully.');
        } catch (\Exception $e) {
            Log::error('Error saving challenge:', ['message' => $e->getMessage()]);
            return redirect()->route('challenges')->with('error', 'Failed to create challenge.');
        }
    }
}
