<?php
  
namespace App\Exports;
  
use App\Currency;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class CurrenciesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Currency::all('currency_code','currency_name');
    }

    public function headings(): array
    {
        return [
            'currency_code',
            'currency_name',
        ];
    }
}