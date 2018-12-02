<?php

namespace App\Servises\SearchService\Contacts;


/**
 * Interface NotesSearcherInterface
 * @package App\Servises\SearchService\Contacts
 */
interface NotesSearcherInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function search($data);
}
