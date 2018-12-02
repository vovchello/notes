<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.12.18
 * Time: 10:00
 */

namespace App\Servises\LinkSharedService;


use App\Repositories\NotesRepository\NotesRepository;
use App\Servises\LinkSharedService\Contacts\LinkSharedInterface;
use Illuminate\Support\Facades\Auth;

class LinkShareService
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

    public function share($id)
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
