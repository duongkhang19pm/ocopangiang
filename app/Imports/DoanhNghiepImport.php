<?php

namespace App\Imports;

use App\Models\DoanhNghiep;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class DoanhNghiepImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $doanhnghiep = DoanhNghiep::create([
            'xa_id' => $row['xa'],
            'tenduong' => $row['ten_duong'],
            'mohinhkinhdoanh_id' => $row['mo_hinh_kinh_doanh'],
            'loaihinhkinhdoanh_id' => $row['loai_hinh_kinh_doanh'],
            'donviquanly_id' => Auth::user()->donviquanly->id,
            'masothue' => $row['ma_so_thue'],
            'tendoanhnghiep' => $row['ten_doanh_nghiep'],
            'tendoanhnghiep_slug' => Str::slug($row['ten_doanh_nghiep']),
            'email' => $row['email'],
            'SDT' => $row['dien_thoai'],
            'website' => $row['website'],
            'ngaythanhlap' => $row['ngay_thanh_lap'],
            'hinhanh' => $row['hinh_anh'],
            'kinhdo' => $row['kinh_do'],
            'vido' => $row['vi_do'],






        ]);
        return $doanhnghiep;
    }
}
