<?php

namespace App\Providers;

use App\Repositories\NotesRepository\Contracts\NoteRepositoryInterface;
use App\Repositories\NotesRepository\NotesRepository;
use App\Repositories\UploadRepository\Contracts\UploadRepositoryInterface;
use App\Repositories\UploadRepository\UploadRepository;
use App\Servises\FileServise\Contact\FileServiceInterface;
use App\Servises\FileServise\FileService;
use App\Servises\LinkSharedService\Contacts\LinkSharedInterface;
use App\Servises\LinkSharedService\LinkShareService;
use App\Servises\SearchService\Contacts\NotesSearcherInterface;
use App\Servises\SearchService\NotesSearcherByTitle;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NotesSearcherInterface::class, NotesSearcherByTitle::class);
        $this->app->bind(FileServiceInterface::class, FileService::class);
        $this->app->bind(LinkSharedInterface::class, LinkShareService::class);
        $this->app->bind(NotesSearcherInterface::class, NotesSearcherByTitle::class);
        $this->app->bind(NoteRepositoryInterface::class, NotesRepository::class);
        $this->app->bind(UploadRepositoryInterface::class,UploadRepository::class);
    }
}
