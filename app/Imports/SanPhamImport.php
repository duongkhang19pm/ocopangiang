<?php

namespace App\Imports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class SanPhamImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
     {
         return new SanPham([
        'nhomsanpham_id' => $row['nhomsanpham_id'],
        'loaisanpham_id' => $row['loaisanpham_id'],
        'donvitinh_id' => $row['donvitinh_id'],
        'quycach_id' => $row['quycach_id'],
        'doanhnghiep_id' => $row['doanhnghiep_id'],
        'phanhang_id' => $row['phanhang_id'],
        'tensanpham' => $row['tensanpham'],
        'tensanpham_slug' => $row['tensanpham_slug'],
        'nguyenlieu' => $row['nguyenlieu'],
        'tieuchuan' => $row['tieuchuan'],
        'dieukienluutru' => $row['dieukienluutru'],
        'dieukienvanchuyen' => $row['dieukienvanchuyen'],
        'khoiluongrieng' => $row['khoiluongrieng'],
        'soluong' => $row['soluong'],
        'dongia' => $row['dongia'],
        'hansudung' => $row['hansudung'],
        'hansudungsaumohop' => $row['hansudungsaumohop'],
        'hinhanh' => $row['hinhanh'],
        ]);
     }
}
