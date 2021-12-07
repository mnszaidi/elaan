<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $answers = json_decode(file_get_contents(__DIR__ . '../../none/answers.json'), true);

        DB::table('answers')->insert($answers);

    }
}
