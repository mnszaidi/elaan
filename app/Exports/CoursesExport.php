<?php
  
namespace App\Exports;
  
use App\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class CoursesExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::all('course_code','course_name');
    }

    public function headings(): array
    {
        return [
            'course_code',
            'course_name',
        ];
    }
}