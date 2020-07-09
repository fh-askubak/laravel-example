<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Factory as Validator;

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

    function create(Request $request, Validator $validator) {
        //validate input
        $validation = $validator->make($request->all(), [
            //validation rules
            'title' => 'required|min:3',
            'content' => 'required|min:5'
        ]);
        //if validation fails, send users back to previous page with errors
        if($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        //create new note
        $note = new Note();
        //assign request input to new note
        $note->title = $request->title;
        $note->content = $request->content;
        //save to database
        $note->save();
        //redirect after saving
        return redirect()->route('adminpage')
            ->with('info', 'New Post Added: ' . $request->input('title'));
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
        //similar to notes method
        $notes = Note::all();

        return view('admin.index', [
            'notes' => $notes
        ]);
    }
}
