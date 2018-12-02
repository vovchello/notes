<?php

namespace App\Http\Controllers;

use App\Servises\LinkSharedService\Contacts\LinkSharedInterface;

class LinkShareController
{
    private $shareService;

    /**
     * LinkShareController constructor.
     * @param LinkSharedInterface $shareService
     */
    public function __construct(LinkSharedInterface $shareService)
    {
        $this->shareService = $shareService;
    }


    public function index($id)
    {
        $link = $this->shareService->share($id);
        return redirect()->route('home')
            ->with('message',$link);
    }
}
