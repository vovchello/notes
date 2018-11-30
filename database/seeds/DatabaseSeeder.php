<?php

use database\seeds\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(array(
            UserSeeder::class,
            NotesSeeder::class
        ));
    }
}
