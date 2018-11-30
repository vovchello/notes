<?php
namespace database\seeds;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class UserSeeder
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     * @throws \Exception
     */
    public function run()
    {
        $date = new DateTime('now');

         DB::table('users')->insert([
             'name' => 'Bob',
             'email' => 'bob@mail.com',
             'password' => bcrypt('1q2w3e4r'),
             'created_at'    => $date,
             'updated_at'    => $date
         ]);

        DB::table('users')->insert([
            'name' => 'Garry',
            'email' => 'garry@mail.com',
            'password' => bcrypt('1q2w3e4r'),
            'created_at'    => $date,
            'updated_at'    => $date
        ]);
    }
}
