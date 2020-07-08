<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    function notes() {
        //find all notes
        $notes = Note::all();
        //return notes view and pass notes to view
        return view('notes.notes', [
            'notes' => $notes
        ]);
    }

    function create(Request $request) {
        //create new note
        $note = new Note();
        //assign request input to new note
        $note->title = $request->title;
        $note->content = $request->content;
        //save to database
        $note->save();
        //redirect after saving
        return redirect('/admin');
    }

    function view($id) {
        //find specific note by id
        $note = Note::findOrFail($id);
        //return single note view and pass found note
        return view('notes.singlenote', [
            'note' => $note
        ]);
    }

    function admin() {
        $notes = Note::all();

        return view('admin.index', [
            'notes' => $notes
        ]);
    }
}
