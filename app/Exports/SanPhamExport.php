<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;

class SanPhamExport implements FromCollection,
 WithHeadings,
WithCustomStartCell,
WithMapping
{
    public function headings(): array
         {
         return [
     
        'loaisanpham_id',
    
        'quycach_id',
        'doanhnghiep_id',
      
        'tensanpham',
        'tensanpham_slug',
        'nguyenlieu',
        'tieuchuan',
        'dieukienluutru',
        'dieukienvanchuyen',
        'khoiluongrieng',
        'soluong',
        'dongia',
        'hansudung',
        'hansudungsaumohop',
      
         ];
         }
         
         public function map($row): array
         {
         return [

         $row->loaisanpham_id,
         $row->quycach_id,
         $row->doanhnghiep_id,
         $row->tensanpham,
         $row->tensanpham_slug,
         $row->nguyenlieu,
         $row->tieuchuan,
         $row->dieukienluutru,
         $row->dieukienvanchuyen,
         $row->khoiluongrieng,
         $row->soluong,
         $row->dongia,
         $row->hansudung,
         $row->hansudungsaumohop,
        
         ];
         }
         
         public function startCell(): string
         {
         return 'A1';
         }
         
         public function collection()
         {
         return SanPham::all();
         }
}
