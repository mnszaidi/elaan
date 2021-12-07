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
        $category_setA->category_code   = 'Web Development';
        $category_setA->category_name   = 'Web Development';
        $category_setA->category_menu   = '1';
        $category_setA->category_status = '1';
        $category_setA->created_by      = 'Monis';
        $category_setA->save();

        $category_setB = new Category();
        $category_setB->category_code   = 'Web Designing';
        $category_setB->category_name   = 'Web Designing';
        $category_setB->category_menu   = '1';
        $category_setB->category_status = '1';
        $category_setB->created_by      = 'Monis';
        $category_setB->save();

        $category_setC = new Category();
        $category_setC->category_code   = 'Digital Marketing';
        $category_setC->category_name   = 'Digital Marketing';
        $category_setC->category_menu   = '1';
        $category_setC->category_status = '1';
        $category_setC->created_by      = 'Monis';
        $category_setC->save();

        $category_setD = new Category();
        $category_setD->category_code   = 'Graphic Desiging';
        $category_setD->category_name   = 'Graphic Desiging';
        $category_setD->category_menu   = '1';
        $category_setD->category_status = '1';
        $category_setD->created_by      = 'Monis';
        $category_setD->save();

        $category_setE = new Category();
        $category_setE->category_code   = 'Accounts and Financial';
        $category_setE->category_name   = 'Accounts and Financial';
        $category_setE->category_menu   = '1';
        $category_setE->category_status = '1';
        $category_setE->created_by      = 'Monis';
        $category_setE->save();

        $category_setF = new Category();
        $category_setF->category_code   = 'Personal Growth';
        $category_setF->category_name   = 'Personal Growth';
        $category_setF->category_menu   = '1';
        $category_setF->category_status = '1';
        $category_setF->created_by      = 'Monis';
        $category_setF->save();

        $category_setG = new Category();
        $category_setG->category_code   = 'Programming & Tech';
        $category_setG->category_name   = 'Programming & Tech';
        $category_setG->category_menu   = '1';
        $category_setG->category_status = '1';
        $category_setG->created_by      = 'Monis';
        $category_setG->save();
    }
}
