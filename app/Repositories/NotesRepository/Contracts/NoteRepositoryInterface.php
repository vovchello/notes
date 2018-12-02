<?php
/**
 * Created by PhpStorm.
 * User: php
 * Date: 28.11.18
 * Time: 18:57
 */

namespace App\Repositories\NotesRepository\Contracts;


/**
 * Interface NoteRepositoryInterface
 * @package App\Repositories\NotesRepository\Contracts
 */
interface NoteRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllUsers();

    /**
     * @param $id
     * @return mixed
     */
    public function getNotesByUserId(int $id);

    /**
     * @param $data
     * @return mixed
     */
    public function createNote(array $data);

    /**
     * @param array $data
     * @param $id
     */
    public function update(array $data, int $id):void;

    /**
     * @param $id
     * @return mixed
     */
    public function deleteNote(int $id):void;

}
