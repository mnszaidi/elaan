<?php
  
namespace App\Exports;
  
use App\Answer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class AnswersExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Answer::all('answer_code','answer_name');
    }

    public function headings(): array
    {
        return [
            'answer_code',
            'answer_name',
        ];
    }
}