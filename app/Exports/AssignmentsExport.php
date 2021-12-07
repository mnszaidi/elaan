<?php
  
namespace App\Exports;
  
use App\Assignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class AssignmentsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Assignment::all('assignment_code','assignment_name');
    }

    public function headings(): array
    {
        return [
            'assignment_code',
            'assignment_name',
        ];
    }
}