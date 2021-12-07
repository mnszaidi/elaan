<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = json_decode(file_get_contents(__DIR__ . '../../none/questions.json'), true);

        DB::table('questions')->insert($questions);
    }
}
