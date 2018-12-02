<?php

namespace App\Console\Commands;

use App\Repositories\NotesRepository\Contracts\NoteRepositoryInterface;
use App\Repositories\UploadRepository\Contracts\UploadRepositoryInterface;
use App\Servises\FileServise\Contact\FileServiceInterface;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * Class NoteLifeTimeChecker
 * @package App\Console\Commands
 */
class NoteLifeTimeChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'note:lifecheker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var UploadRepositoryInterface
     */
    private $uploadRepository;

    /**
     * @var NoteRepositoryInterface
     */
    private $noteRepository;

    /**
     * @var FileServiceInterface
     */
    private $fileService;

    /**
     * Create a new command instance.
     *
     * @param UploadRepositoryInterface $uploadRepository
     * @param NoteRepositoryInterface $noteRepository
     * @param FileServiceInterface $fileService
     */
    public function __construct(
        UploadRepositoryInterface $uploadRepository,
        NoteRepositoryInterface $noteRepository,
        FileServiceInterface $fileService)
    {
        parent::__construct();

        $this->uploadRepository = $uploadRepository;
        $this->noteRepository = $noteRepository;
        $this->fileService = $fileService;

    }

    /**
     * Execute the console command.
     * @var Carbon $noteDate
     * @return mixed
     */
    public function handle()
    {

        $notes = $this->noteRepository->getOldData();
        foreach($notes as $note) {
                $this->deleteDataByNoteId($note->id);
        }
        Log:info(count($notes) . ' notes was deleted');

    }

    /**
     * @param $noteId
     */
    private function deleteDataByNoteId($noteId)
    {
        if($this->uploadRepository->getUploadByNoteId($noteId)) {
            $this->fileService->deleteFile($this->uploadRepository->findPathByNoteId($noteId));
        }
        $this->uploadRepository->deleteUpload($noteId);
        $this->noteRepository->deleteNote($noteId);
    }
}
