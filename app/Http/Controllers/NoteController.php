<?php

namespace App\Http\Controllers;

use App\Models\Notes\Note;
use App\Repositories\NotesRepository\NotesRepository;
use App\Validators\NoteValidators\NoteValidator;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    private $noteRpository;

    private $note;

    /**
     * NoteController constructor.
     * @param $noteRpository
     */
    public function __construct(NotesRepository $noteRpository, Note $note)
    {
        $this->noteRpository = $noteRpository;
        $this->note = $note;
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $note = $this->noteRpository->getNoteById($id);
        return view('edit',[
            'note' => $note
            ]);
    }

    public function create(Request $request)
    {
        return view('create');
    }

    public function store(NoteValidator $request)
    {
        $notes = $request->validated();
        $this->noteRpository->createNote($notes);
        return redirect()->route('home')
            ->with('message','Note was stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('show');
        $note = $this->noteRpository->getNoteById($id);
        return view('edit',[
            'note' => $note
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $note = $this->noteRpository->getNoteById($id);
        return view('edit',[
            'note' => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteValidator $request, $id)
    {
        $notes = $request->validated();
        $this->noteRpository->update($notes,$id);
        return redirect()->route('home')
            ->with('message','Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
     $this->noteRpository->deleteNote($id);
     return redirect()->route('home')
         ->with('message','Note was deleted');
    }


}
