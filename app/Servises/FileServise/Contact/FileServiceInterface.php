<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.12.18
 * Time: 22:04
 */

namespace App\Servises\FileServise\Contact;


use Illuminate\Http\UploadedFile;

/**
 * Interface FileServiceInterface
 * @package App\Servises\FileServise\Contact
 */
interface FileServiceInterface
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function save(UploadedFile $file):string;

    /**
     * @param $path
     */
    public function deleteFile($path):void;
}
