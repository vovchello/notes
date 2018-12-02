<?php

namespace App\Providers;

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
    }
}
