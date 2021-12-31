<?php

namespace App\Imports;

use App\Models\DonViQuanLy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DonViQuanLyImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        return new DonViQuanLy([
            'tinh_id' => $row['ma_tinh'],
            'huyen_id' => $row['ma_huyen'],
            'xa_id' => $row['ma_xa'],
            'tenduong' => $row['ten_duong'],
            'tendonviquanly' => $row['ten_don_vi_quan_ly'],
            'tendonviquanly_slug' => $row['ten_don_vi_quan_ly_khong_dau'],
            'tenthutruong' => $row['ten_thu_truong'],
            'email' => $row['email'],
            'SDT' => $row['dien_thoai'],
        ]);
    }
    public function headingRow(): int
     {
     return 6;
     }

}
