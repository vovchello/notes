<?php

namespace App\Servises\LinkSharedService\Contacts;

/**
 * Interface LinkSharedInterface
 * @package App\Servises\LinkSharedService\Contacts
 */
interface LinkSharedInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function share(int $id);
}
