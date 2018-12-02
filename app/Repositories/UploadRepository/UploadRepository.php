<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.12.18
 * Time: 12:03
 */

namespace App\Repositories\UploadRepository;


use App\Models\Upload\Upload;

/**
 * Class UploadRepository
 * @package App\Repositories\UploadRepository
 */
class UploadRepository
{
    /**
     * @var Upload
     */
    private $upload;

    /**
     * UploadRepository constructor.
     * @param $upload
     */
    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
    }


    /**
     * @param $noteId
     * @param $path
     */
    public function createUpload($noteId, $path)
    {
        $this->saveUpload($noteId, $path);
    }

    /**
     * @param $noteId
     * @param $path
     */
    private function saveUpload($noteId, $path):void
    {
        $this->upload->note_id = $noteId;
        $this->upload->path = $path;
        $this->save($this->upload);
    }

    /**
     * @param $upload
     */
    private function save($upload):void
    {
        $upload->save();
    }

    /**
     * @param $noteId
     */
    public function deleteUpload($noteId)
    {
        $this->upload->where('note_id',$noteId)->delete();
    }

    /**
     * @param $noteId
     * @return mixed
     */
    public function findPathByNoteId($noteId)
    {
        return $this->upload->where('note_id',$noteId)->first()->path;
    }

    /**
     * @param int $noteId
     * @param string $filePath
     */
    public function update(int $noteId, string $filePath)
    {
        $upload = $this->getUploadByNoteId($noteId);
        $upload->path = $filePath;
        $this->save($upload);
    }

    /**
     * @param $noteId
     * @return mixed
     */
    private function getUploadByNoteId($noteId)
    {
        return $this->upload->where('note_id',$noteId)->first();
    }
}
