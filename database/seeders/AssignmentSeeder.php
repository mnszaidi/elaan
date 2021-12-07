<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignments = json_decode(file_get_contents(__DIR__ . '../../none/assignments.json'), true);

        DB::table('assignments')->insert($assignments);
    }
}
