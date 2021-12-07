<?php
  
namespace App\Exports;
  
use App\Tag;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
  
class TagsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tag::all('tag_code','tag_name');
    }

    public function headings(): array
    {
        return [
            'tag_code',
            'tag_name',
        ];
    }
}