<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime('now');
        $faker = Faker::create('App\Models\Notes','ru_RU');
        for ($i = 1; $i <= 500; $i ++){
            DB::table('notes')->insert([
                'title' => $faker->sentence,
                'description' =>$faker->text,
                'user_id' => $faker->numberBetween(1,2),
                'created_at'    => $date,
                'updated_at'    => $date
            ]);
        }

//
//        DB::table('notes')->insert([
//            'title' => ' Business Thank You Note Samples ',
//            'description' => 'There are many reasons to thank someone you know through business.
// You might need to thank a vendor for a quick turnaround or a client for their continued business.
// You might thank a colleague or manager for their assistance on a project or an intern for their
// hard work during their time at your company.',
//            'user_id' => 1,
//            'created_at'    => $date,
//            'updated_at'    => $date
//        ]);
//
//        DB::table('notes')->insert([
//            'title' => 'Email Thank You Note Samples',
//            'description' => 'Need to send a thank-you note in a hurry? An email may be your best bet.',
//            'user_id' => 2,
//            'created_at'    => $date,
//            'updated_at'    => $date
//        ]);
//
//        DB::table('notes')->insert([
//            'title' => 'Employee Thank You Note Samples',
//            'description' => 'Not everyone sends thank-you notes to colleagues or employees who’ve done a great job.
// But, that’s all the more reason to do it – your thank you will really stand out!',
//            'user_id' => 2,
//            'created_at'    => $date,
//            'updated_at'    => $date
//        ]);
    }
}
