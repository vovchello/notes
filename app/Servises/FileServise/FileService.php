<?php
/**
 * Created by PhpStorm.
 * User: panda
 * Date: 02.12.18
 * Time: 12:08
 */

namespace App\Servises\FileServise;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;

/**
 * Class FileService
 * @package App\Servises\FileServise
 */
class FileService
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public function save(UploadedFile $file):string
    {
        $file->move(public_path() . '/files');
        $path = 'files/'.$file->getFilename();
        return $path;
    }

    /**
     * @param $path
     */
    public function deleteFile($path):void
    {
        if(file_exists($path))
        {
            $fileSystem = $this->getFileSystem();
            $fileSystem->delete($path);
        }
    }

    /**
     * @return Filesystem
     */
    private function getFileSystem():Filesystem
    {
        return app(Filesystem::class);
    }
}
