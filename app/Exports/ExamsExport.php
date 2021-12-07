<?php
  
namespace App\Exports;
  
use App\Exam;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class ExamsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Exam::all('exam_code','exam_name');
    }

    public function headings(): array
    {
        return [
            'exam_code',
            'exam_name',
        ];
    }
}