<?php

namespace App\Repositories\NotesRepository;


use App\Models\Notes\Note;
    use App\Repositories\BaseRepository;
    use App\Repositories\NotesRepository\Contracts\NoteRepositoryInterface;
    use Illuminate\Support\Facades\Auth;

    /**
     * Class NotesRepository
     * @package App\Repositories\NotesRepository
     */
    class NotesRepository extends BaseRepository implements NoteRepositoryInterface
    {

        private $protected = 1;

        /**
         * @var Note
         */
        private $note;

        /**
         * NotesRepository constructor.
         * @param Note $note
         */
        public function __construct(Note $note)
        {
            $this->note = $note;
        }

        /**
         * @return Note[]|\Illuminate\Database\Eloquent\Collection
         */
        public function getAll()
        {
            return $this->note->all();
        }

        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function getAllUsers()
        {
            return $this->note->user();
        }

        /**
         * @param $id
         * @return mixed
         */
        public function getNoteById(int $id)
        {
            return $this->note->where('id',$id)->first();
        }

        /**
         * @param $id
         * @return mixed
         */
        public function getNotesByUserId(int $id)
        {
            return $this->findNotesByUserId($id)->get();
        }

        /**
         * @return Note
         */
        public function findNotesByUserId(int $id)
        {
            return $this->note->where('user_id',$id);
        }

        /**
         * @param string $id
         * @param string $param
         * @param $data
         * @return mixed
         */
        public function where(string $id, string $param, $data)
        {
            return $this->note->where($id,$param,$data);
        }


        /**
         * @param $data
         */
        public function createNote(array $data)
        {
            $data['userId'] = Auth::id();
            $this->saveNote($this->note,$data);
            return $this->note->id;

        }

        /**
         * @param $data
         * @param $id
         */
        public function update(array $data, int $id):void
        {
            $note = $this->getModelNoteById($id);
            $data['userId']=$this->getUserNoteById($id);
            $this->saveNote($note,$data);
        }

        public function getUserNoteById($noteId)
        {
            $note = $this->getModelNoteById($noteId);
            return $note->user()->first()->id;
        }

        /**
         * @param int $id
         */
        public function deleteNote(int $id):void
        {
            $this->note->where('id',$id)->delete();
        }

        /**
         * @param $id
         * @return mixed
         */
        private function getModelNoteById(int $id)
        {
            return $this->note->find($id);
        }

        /**
         * @param $note
         * @param $data
         */
        private function saveNote(Note $note, array $data):void
        {
            $note->title = $data['title'];
            $note->description = $data['description'];
            $note->user_id = $data['userId'];
            $note->protected = $this->protected;
            $this->save($note);
        }

        /**
         * @param $data
         */
        public function shareProtectedField():void
        {
            $this->protected = 0;
        }

        /**
         * @param Note $note
         */
        private function save(Note $note):void
        {
            $note->save();
        }

        public function getNoteProtectionStatus($noteId)
        {
            return $this->note->where('id',$noteId)->first()->protected;
        }



    }
