<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.12.18
 * Time: 9:10
 */

namespace App\Servises\SearchService;


use App\Repositories\NotesRepository\NotesRepository;
use App\Servises\SearchService\Contacts\NotesSearcherInterface;
use Illuminate\Support\Facades\Auth;

class NotesSearcherByTitle implements NotesSearcherInterface
{
    private $noteRepository;


    /**
     * NotesSearcherByTitle constructor.
     * @param NotesRepository $noteRepository
     */
    public function __construct(NotesRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function search($data)
    {
        $authUserId = Auth::id();
        return $this->noteRepository->findNotesByUserId($authUserId)->where('title', 'LIKE', '%' . $data . '%')->get();
    }

}
