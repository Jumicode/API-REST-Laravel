<?php

namespace App\Http\Controllers;


use App\Models\Note;
use App\Http\Requests\NoteRequest;
class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
      $notes = Note::all();
      return response()->json($notes, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
    Note::create($request->all());
    return response()->json([
        'success' => true
    ], 201);
    }

    public function show($id)
    {
       $note = Note::fin($id);
       return response()->json($note,200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id)
    {
        $note = Note::find($id);
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();


       return response()->json([
        'success' => true
       ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::find($id)->delete();
        return response()->json([
            'success'=> true
        ], 200);
    }
}
