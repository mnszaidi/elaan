<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency_setA = new Currency();
        $currency_setA->currency_code   = 'USD';
        $currency_setA->currency_name   = 'United Stated Dollar';
        $currency_setA->currency_symbol = '$';
        $currency_setA->currency_status = '1';
        $currency_setA->created_by      = 'Monis';
        $currency_setA->save();

        $currency_setB = new Currency();
        $currency_setB->currency_code   = 'PKR';
        $currency_setB->currency_name   = 'Pakistani Rupees';
        $currency_setB->currency_symbol = 'Rs';
        $currency_setB->currency_status = '1';
        $currency_setB->created_by      = 'Monis';
        $currency_setB->save();

        $currency_setC = new Currency();
        $currency_setC->currency_code   = 'GBP';
        $currency_setC->currency_name   = 'British Pounds';
        $currency_setC->currency_symbol = '£';
        $currency_setC->currency_status = '1';
        $currency_setC->created_by      = 'Monis';
        $currency_setC->save();

        $currency_setD = new Currency();
        $currency_setD->currency_code   = 'EURO';
        $currency_setD->currency_name   = 'European Union Euro';
        $currency_setD->currency_symbol = '€';
        $currency_setD->currency_status = '1';
        $currency_setD->created_by      = 'Monis';
        $currency_setD->save();
    }
}
