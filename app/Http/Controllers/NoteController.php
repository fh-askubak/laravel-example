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
        //redirect after saving and include title of input with Session
        return redirect()->route('adminpage')
            ->with('info', 'New Post Added: ' . $request->input('title'));
    }

    function viewNote($id) {
        //find specific note by id
        $note = Note::findOrFail($id);
        //return single note view and pass found note
        return view('notes.singlenote', [
            'note' => $note
        ]);
    }

    function edit($id) {
        //get note to edit
        $noteToEdit = Note::findOrFail($id);
        //redirect to edit page with note data
        return view('notes.editnotepage', [
            'note' => $noteToEdit
        ]);
    }
    function update($id, Request $request){
        //find note
        $update = Note::findOrFail($id);
        //update fields from request if they are not empty
        if('' != $request->title){
            $update->title = $request->title;
        }
        if('' != $request->content) {
            $update->content = $request->content;
        }
        //save new note
        $update->save();
        //redirect back to admin page
        return redirect()
            ->route('adminpage')
            ->with('update', 'Note updated!');
    }

    function deleteNote($id) {
        //find note to be deleted
        $noteToBeDeleted = Note::findOrFail($id);
        //send user to delete page
        return view('notes.deletenotepage', [
            'note' => $noteToBeDeleted
        ]);
    }

    function delete($id) {
        //find note to delete
        $note = Note::findOrFail($id);
        //if exists, delete note
        Note::destroy($note->id);
        //redirect back to admin page
        return redirect()->route('adminpage')->with('deleted', 'Note Deleted):');
    }

    function admin() {
        //similar to notes method
        $notes = Note::all();

        return view('admin.index', [
            'notes' => $notes
        ]);
    }
}
