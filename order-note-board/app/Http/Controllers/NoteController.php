<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function index()
    {
        return \App\Models\Note::latest()->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required',
            'message' => 'required',
            'author' => 'required',
        ]);

        $note = \App\Models\Note::create($validated);

        return response()->json($note, 201);
    }
}
