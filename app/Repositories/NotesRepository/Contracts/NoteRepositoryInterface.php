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
    public function getAll();
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

    /**
     *
     */
    public function shareProtectedField():void;

    /**
     * @param $noteId
     * @return mixed
     */
    public function getNoteProtectionStatus($noteId);

    /**
     * @param $noteId
     * @return mixed
     */
    public function getUserNoteById($noteId);

    /**
     * @param int $id
     * @return mixed
     */
    public function getNoteById(int $id);

    /**
     * @param int $id
     * @return mixed
     */
    public function findNotesByUserId(int $id);

    /**
     * @param string $id
     * @param string $param
     * @param $data
     * @return mixed
     */
    public function where(string $id, string $param, $data);

    public function getOldData();


}
