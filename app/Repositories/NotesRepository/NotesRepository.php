<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 28.11.18
 * Time: 18:33
 */

namespace App\Repositories\NotesRepository;


use App\Models\Notes\Note;
use App\Repositories\BaseRepository;
use App\Repositories\NotesRepository\Contracts\NoteRepositoryInterface;

class NotesRepository extends BaseRepository implements NoteRepositoryInterface
{
    private $note;

    /**
     * NotesRepository constructor.
     * @param $note
     */
    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public function getAll()
    {
        return $this->note->all();
    }

    public function getAllUsers()
    {
        return $this->note->user();
    }


}