<?php

namespace App\Imports;

use App\Models\DonViQuanLy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
class DonViQuanLyImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
     
        $donviquanly = DonViQuanLy::create([

            
            'xa_id' => $row['xa'],
            'tenduong' => $row['ten_duong'],
            'tendonviquanly' => $row['ten_don_vi'],
            'tendonviquanly_slug' => Str::slug($row['ten_don_vi']),
            'tenthutruong' => $row['ho_ten_thu_truong'],
            'email' => $row['email'],
            'SDT' => $row['dien_thoai'],
            'website' => $row['website'],
            'hinhanh' => $row['hinh_anh'],





        ]);
        return $donviquanly;
    }
   
}
