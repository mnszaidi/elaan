<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_setA = new Tag();
        $tag_setA->tag_code     = 'Free';
        $tag_setA->tag_name     = 'Free';
        $tag_setA->tag_status   = '1';
        $tag_setA->created_by   = 'Monis';
        $tag_setA->save();

        $tag_setB = new Tag();
        $tag_setB->tag_code     = 'Beginner';
        $tag_setB->tag_name     = 'Beginner';
        $tag_setB->tag_status   = '1';
        $tag_setB->created_by   = 'Monis';
        $tag_setB->save();

        $tag_setC = new Tag();
        $tag_setC->tag_code     = 'Advanced';
        $tag_setC->tag_name     = 'Advanced';
        $tag_setC->tag_status   = '1';
        $tag_setC->created_by   = 'Monis';
        $tag_setC->save();

        $tag_setD = new Tag();
        $tag_setD->tag_code     = 'Expert';
        $tag_setD->tag_name     = 'Expert';
        $tag_setD->tag_status   = '1';
        $tag_setD->created_by   = 'Monis';
        $tag_setD->save();
    }
}
