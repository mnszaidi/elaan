<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_setA = new Category();
        $category_setA->category_code   = 'Medical Help';
        $category_setA->category_name   = 'Medical Help';
        $category_setA->category_menu   = '1';
        $category_setA->category_status = '1';
        $category_setA->created_by      = 'Monis';
        $category_setA->save();

        $category_setB = new Category();
        $category_setB->category_code   = 'Child Education';
        $category_setB->category_name   = 'Child Education';
        $category_setB->category_menu   = '1';
        $category_setB->category_status = '1';
        $category_setB->created_by      = 'Monis';
        $category_setB->save();

        $category_setC = new Category();
        $category_setC->category_code   = 'Healthy Food';
        $category_setC->category_name   = 'Healthy Food';
        $category_setC->category_menu   = '1';
        $category_setC->category_status = '1';
        $category_setC->created_by      = 'Monis';
        $category_setC->save();

        $category_setD = new Category();
        $category_setD->category_code   = 'Clean Water';
        $category_setD->category_name   = 'Clean Water';
        $category_setD->category_menu   = '1';
        $category_setD->category_status = '1';
        $category_setD->created_by      = 'Monis';
        $category_setD->save();

        $category_setE = new Category();
        $category_setE->category_code   = 'Lost or Found';
        $category_setE->category_name   = 'Lost or Found';
        $category_setE->category_menu   = '1';
        $category_setE->category_status = '1';
        $category_setE->created_by      = 'Monis';
        $category_setE->save();

        $category_setF = new Category();
        $category_setF->category_code   = 'Animal Help';
        $category_setF->category_name   = 'Animal Help';
        $category_setF->category_menu   = '1';
        $category_setF->category_status = '1';
        $category_setF->created_by      = 'Monis';
        $category_setF->save();

        $category_setG = new Category();
        $category_setG->category_code   = 'Business Investments';
        $category_setG->category_name   = 'Business Investments';
        $category_setG->category_menu   = '1';
        $category_setG->category_status = '1';
        $category_setG->created_by      = 'Monis';
        $category_setG->save();
    }
}
