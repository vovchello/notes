<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.12.18
 * Time: 22:17
 */

namespace App\Repositories\UploadRepository\Contracts;


/**
 * Interface UploadRepositoryInterface
 * @package App\Repositories\UploadRepository\Contracts
 */
interface UploadRepositoryInterface
{
    /**
     * @param $noteId
     * @param $path
     */
    public function createUpload($noteId, $path):void;

    /**
     * @param $noteId
     */
    public function deleteUpload($noteId):void;

    /**
     * @param $noteId
     * @return mixed
     */
    public function findPathByNoteId($noteId);

    /**
     * @param int $noteId
     * @param string $filePath
     */
    public function update(int $noteId, string $filePath):void;

    /**
     * @param int $noteId
     * @return mixed
     */
    public function getUploadByNoteId(int $noteId);
}
