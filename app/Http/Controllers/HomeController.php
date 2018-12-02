<?php

namespace App\Http\Controllers;

use App\Repositories\NotesRepository\Contracts\NoteRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $notesRepository;

    private $authUserId;

    /**
     * Create a new controller instance.
     *
     * @param NoteRepositoryInterface $notesRepository
     *
     */
    public function __construct(NoteRepositoryInterface $notesRepository)
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
        $notes = $this->notesRepository->getNotesByUserId($this->authUserId);
        return view('home', [
            'notes' => $notes
        ]);
    }
}
