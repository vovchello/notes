<?php

use Illuminate\Database\Seeder;

class NotesSeeder1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime('now');

        DB::table('notes')->insert([
            'title' => ' Business Thank You Note Samples ',
            'descriprion' => 'There are many reasons to thank someone you know through business. 
 You might need to thank a vendor for a quick turnaround or a client for their continued business. 
 You might thank a colleague or manager for their assistance on a project or an intern for their 
 hard work during their time at your company.',
            'user_id' => 1,
            'created_at'    => $date,
            'updated_at'    => $date
        ]);

        DB::table('notes')->insert([
            'title' => 'Email Thank You Note Samples',
            'descriprion' => 'Need to send a thank-you note in a hurry? An email may be your best bet.',
            'user_id' => 2,
            'created_at'    => $date,
            'updated_at'    => $date
        ]);

        DB::table('notes')->insert([
            'title' => 'Employee Thank You Note Samples',
            'descriprion' => 'Not everyone sends thank-you notes to colleagues or employees who’ve done a great job. 
 But, that’s all the more reason to do it – your thank you will really stand out!',
            'user_id' => 2,
            'created_at'    => $date,
            'updated_at'    => $date
        ]);
    }
}
