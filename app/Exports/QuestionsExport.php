<?php
  
namespace App\Exports;
  
use App\Question;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class QuestionsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Question::all('question_code','question_name');
    }

    public function headings(): array
    {
        return [
            'question_code',
            'question_name',
        ];
    }
}