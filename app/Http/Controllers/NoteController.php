<?php

namespace App\Http\Controllers;

use App\Models\Notes\Note;
use App\Repositories\NotesRepository\NotesRepository;
use App\Repositories\UploadRepository\UploadRepository;
use App\Servises\FileServise\FileService;
use App\Validators\NoteValidators\NoteValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class NoteController
 * @package App\Http\Controllers
 */
class NoteController extends Controller
{
    /**
     * @var NotesRepository
     */
    private $noteRpository;

    /**
     * @var UploadRepository
     */
    private $uploadRepository;

    /**
     * @var FileService
     */
    private $fileService;

    /**
     * NoteController constructor.
     * @param NotesRepository $noteRpository
     * @param UploadRepository $uploadRepository
     * @param FileService $fileService
     */
    public function __construct(NotesRepository $noteRpository, UploadRepository $uploadRepository, FileService $fileService)
    {
        $this->noteRpository = $noteRpository;
        $this->middleware('auth');
        $this->uploadRepository = $uploadRepository;
        $this->fileService = $fileService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('create');
    }

    /**
     * @param NoteValidator $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NoteValidator $request)
    {
        $notes = $request->validated();
        $noteId = $this->noteRpository->createNote($notes);
        if(isset($notes['upload'])){
            $path = $this->fileService->save($notes['upload']);
            $this->uploadRepository->createUpload($noteId,$path);
        }
        return redirect()->route('home')
            ->with('message','Note was stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::id();
        $noteRepository = $this->noteRpository;
        if($userId === $noteRepository->getUserNoteById($id) or ($noteRepository->getNoteProtectionStatus($id) === 0)){
            $note = $noteRepository->getNoteById($id);
            return view('view',[
                'note' => $note
            ]);
        }
        return redirect()->route('home')
            ->with('message','You have no permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $note = $this->noteRpository->getNoteById($id);
        return view('edit',[
            'note' => $note
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NoteValidator $request
     * @param  int $noteId
     * @return \Illuminate\Http\Response
     */
    public function update(NoteValidator $request, $noteId)
    {
        $notes = $request->validated();
        $this->noteRpository->update($notes,$noteId);
        if(isset($notes['upload'])){
            $newFilePath = $this->fileService->save($notes['upload']);
            $savedInDbPath = $this->uploadRepository->findPathByNoteId($noteId);
            $this->uploadRepository->update($noteId,$newFilePath);
            $this->fileService->deleteFile($savedInDbPath);
        }
        return redirect()->route('home')
            ->with('message','Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $noteId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $noteId)
    {
        if($this->uploadRepository->getUploadByNoteId($noteId)){
            $this->fileService->deleteFile($this->uploadRepository->findPathByNoteId($noteId));
        }
        $this->uploadRepository->deleteUpload($noteId);
        $this->noteRpository->deleteNote($noteId);
        return redirect()->route('home')
             ->with('message','Note was deleted');
    }


}
