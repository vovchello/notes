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
                'protected' => 1,
                'created_at'    => $date,
                'updated_at'    => $date
            ]);
        }
    }
}
