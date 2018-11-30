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
        public function getNoteById($id)
        {
            return $this->note->where('id',$id)->first();
        }

        /**
         * @param $id
         * @return mixed
         */
        public function findNotesByUserId($id)
        {
            return $this->note->where('user_id',$id)->get();
        }

        /**
         * @param $data
         */
        public function createNote($data)
        {
            $data['userId'] = Auth::id();
            $this->saveNote($this->note,$data);

        }

        /**
         * @param $data
         * @param $id
         */
        public function update(array $data, $id):void
        {
            $note = $this->getModelNoteById($id);
            $data['userId']=$note->user()->id;
            $this->saveNote($note,$data);
        }

        public function delete($id)
        {

        }

        /**
         * @param $id
         * @return mixed
         */
        private function getModelNoteById($id)
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
            $note->save();
        }

    }
