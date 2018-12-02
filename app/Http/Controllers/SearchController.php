<?php

namespace App\Http\Controllers;

use App\Models\Notes\Note;
use App\Repositories\NotesRepository\NotesRepository;
use App\Servises\SearchService\Contacts\NotesSearcherInterface;
use App\Validators\SearchValidator\SearchValidator;
use Illuminate\Support\Facades\Auth;


class SearchController
{
    private $searcher;

    /**
     * SearchController constructor.
     * @param $noteRepository
     */
    public function __construct(NotesSearcherInterface $searcher)
    {
        $this->searcher = $searcher;
    }


    public function search(SearchValidator $request)
    {
        $data = $request->validated();
        $notes = $this->searcher->search($data['search']);
        return view('home', [
            'notes' => $notes
        ]);

    }
}
