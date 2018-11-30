<?php

namespace App\Http\Controllers;

use App\Repositories\NotesRepository\NotesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $notesRepository;

    private $authUserId;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotesRepository $notesRepository, Request $request)
    {
        $this->middleware('auth');
        $this->notesRepository = $notesRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authUserId = Auth::id();
        $notes = $this->notesRepository->findNotesByUserId($this->authUserId);
        return view('home', [
            'notes' => $notes
        ]);
    }
}
