<?php

namespace App\Http\Controllers;


use App\Models\Note;
use App\Http\Requests\NoteRequest;
use App\Http\Resources\NoteResource;

class NoteController extends Controller
{

    public function index()
    {
      return NoteResource::collection(Note::all());

    }


    public function store(NoteRequest $request)
    {
   $note = Note::create($request->all());
    return response()->json([
        'success' => true,
        'data' => $note
    ], 201);
    }

    public function show($id)
    {
       $note = Note::fin($id);
       return response()->json($note,200);
    }

    public function update(NoteRequest $request, $id)
    {
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();


       return response()->json([
        'success' => true,
        'data' => $note
       ], 200);

    }

    public function destroy($id)
    {
        Note::find($id)->delete();
        return response()->json([
            'success'=> true
        ], 200);
    }
}
