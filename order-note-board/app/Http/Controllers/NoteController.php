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
            'order_number' => 'required|min:5' ,
            'message' => 'required',
            'author' => 'required',
        ]);

        $note = \App\Models\Note::create($validated);

        return response()->json($note, 201);

    }
 

    public function destroy($id)
    {
        $note = \App\Models\Note::findOrFail($id);
        $note->delete();

        return response()->json(null, 204);
    }
}
