<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function createNote(Request $request) {
        $noteFields = $request->validate([
            'title' => 'required',
            'body' => 'required '
        ]);

        $noteFields['title'] = strip_tags($noteFields['title']);
        $noteFields['body'] = strip_tags($noteFields['body']);
        $noteFields['user_id'] = auth()->id();

        Note::create($noteFields);
        return redirect('/');

    }
}
