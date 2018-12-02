<?php

namespace App\Servises\LinkSharedService;

use App\Repositories\NotesRepository\NotesRepository;
use App\Servises\LinkSharedService\Contacts\LinkSharedInterface;

class LinkShareService implements LinkSharedInterface
{

    private $notesRepository;

    /**
     * LinkShareController constructor.
     * @param $notesRepository
     */
    public function __construct(NotesRepository $notesRepository)
    {
        $this->notesRepository = $notesRepository;
    }

    public function share(int $id)
    {
        $data =$this->changeDataForSave ($this->notesRepository->getNoteById($id));
        $this->notesRepository->shareProtectedField();
        $this->notesRepository->update($data,$id);
        return 'http://notes.loc/notes/show/' . $id;

    }

    private function changeDataForSave($note)
    {
        return $data =[
            'title' => $note->title,
            'description' => $note->description,
        ];
    }
}
