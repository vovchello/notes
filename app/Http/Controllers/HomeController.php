<?php

namespace App\Http\Controllers;

use App\Repositories\NotesRepository\NotesRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $notesRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotesRepository $notesRepository)
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
        $notes = $this->notesRepository->getAll();
        return view('home', [
            'notes' => $notes
        ]);
    }
}
