<?php

namespace App\Http\Controllers;

use App\Servises\LinkSharedService\LinkShareService;

class LinkShareController
{
    private $shareService;

    /**
     * LinkShareController constructor.
     * @param $sharer
     */
    public function __construct(LinkShareService $shareService)
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
