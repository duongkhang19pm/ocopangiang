<?php

namespace App\Exports;

use App\Models\DonViQuanLy;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;


class DonViQuanLyExport implements FromCollection,
                                    WithHeadings,
                                    WithCustomStartCell,
                                    WithMapping
{
    public function headings(): array
     {
         return [
         'Mã tỉnh',
         'Mã huyện',
         'Mã xã',
         'Tên đường',
         'Tên đơn vị quản lý',
         'Tên đơn vị quản lý không dấu',
         'Tên thủ trưởng',
         'Email',
         'Điện thoại',
         ];
     }
     
     public function map($row): array
     {
         return [
         $row->tinh_id,
         $row->huyen_id,
         $row->xa_id,
         $row->tenduong,
         $row->tendonviquanly,
         $row->tendonviquanly_slug,
         $row->tenthutruong,
         $row->email,
         $row->SDT,
         ];
     }
     
     public function startCell(): string
     {
         return 'A6';
     }
     
     public function collection()
     {
        return DonViQuanLy::all();
     }
 }

