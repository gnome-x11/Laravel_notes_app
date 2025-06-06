<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function deleteNote(Note $note) {
        if(auth()->user()->id === $note['user_id']) {
            $note->delete();
        }
        return redirect('note');
    }

    public function updateNote(Note $note, Request $request) {
        if(auth()->user()->id !== $note['user_id']) {
            return redirct('note');
        }

        $editNoteFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $editNoteFields['title'] = strip_tags($editNoteFields['title']);
        $editNoteFields['body'] = strip_tags($editNoteFields['body']);

        $note->update($editNoteFields);
        return redirect('note');
    }

    public function showEditScreen(Note $note) {

        if(auth()->user()->id !== $note['user_id']) {
            return redirct('welcome');
        }
        return view ('/edit_note', ['note' => $note]);
    }

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
