<?php

namespace App\Imports;

use App\Models\DoanhNghiep;
use App\Models\Xa;
use App\Models\MoHinhKinhDoanh;
use App\Models\LoaiHinhKinhDoanh;
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
        $dn= DoanhNghiep::where('tendoanhnghiep_slug',Str::slug($row['ten_doanh_nghiep']))->first();
        $xa= Xa::where('tenxa',$row['xa'])->first();
        $mohinhkinhdoanh= MoHinhKinhDoanh::where('tenmohinhkinhdoanh',$row['mo_hinh_kinh_doanh'])->first();
        $loaihinhkinhdoanh= LoaiHinhKinhDoanh::where('tenloaihinhkinhdoanh',$row['loai_hinh_kinh_doanh'])->first();
        if(empty($dn))
        {
            $doanhnghiep = DoanhNghiep::create([
                'xa_id' => $xa->id,
                'tenduong' => $row['ten_duong'],
                'mohinhkinhdoanh_id' => $mohinhkinhdoanh->id,
                'loaihinhkinhdoanh_id' => $loaihinhkinhdoanh->id,
                'donviquanly_id' => Auth::user()->donviquanly->id,
                'masothue' => $row['ma_so_thue'],
                'tendoanhnghiep' => $row['ten_doanh_nghiep'],
                'tendoanhnghiep_slug' => Str::slug($row['ten_doanh_nghiep']),
                'email' => $row['email'],
                'SDT' => $row['dien_thoai'],
                'website' => $row['website'],
                'ngaythanhlap' => \Carbon\Carbon::parse($row['ngay_thanh_lap'])->format('Y-m-d'),
                'hinhanh' => $row['hinh_anh'],
                'kinhdo' => $row['kinh_do'],
                'vido' => $row['vi_do'],






            ]);
            return $doanhnghiep;
        }
        else
        {
            $orm = DoanhNghiep::find($dn->id);
            $orm->xa_id = $xa->id;
            $orm->tenduong = $row['ten_duong'];
            $orm->mohinhkinhdoanh_id = $mohinhkinhdoanh->id;
            $orm->loaihinhkinhdoanh_id = $loaihinhkinhdoanh->id;
            $orm->donviquanly_id = Auth::user()->donviquanly->id;
            $orm->masothue = $row['ma_so_thue'];
            $orm->tendoanhnghiep = $row['ten_doanh_nghiep'];
            $orm->tendoanhnghiep_slug = Str::slug($row['ten_doanh_nghiep']);
            $orm->email = $row['email'];
            $orm->SDT = $row['dien_thoai'];
            $orm->website =  $row['website'];
            $orm->ngaythanhlap = \Carbon\Carbon::parse($row['ngay_thanh_lap'])->format('Y-m-d');
            $orm->hinhanh = $row['hinh_anh'];
            $orm->kinhdo = $row['kinh_do'];
            $orm->vido = $row['vi_do'];
          
            return $orm;

        }
    }
}
