<?php

namespace App\Imports;

use App\Models\DonViQuanLy;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use App\Models\Xa;
class DonViQuanLyImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
        $donvi= DonViQuanLy::where('tendonviquanly_slug',Str::slug($row['ten_don_vi']))->first();
        $xa= Xa::where('tenxa',$row['xa'])->first();
        if(empty($donvi))
        {
            $donviquanly = DonViQuanLy::create([

            
                'xa_id' => $xa->id,
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
        else
        {
            $orm = DonViQuanLy::find($donvi->id);
            $orm->xa_id = $xa->id;
            $orm->tenduong = $row['ten_duong'];
            $orm->tendonviquanly = $row['ten_don_vi'];
            $orm->tendonviquanly_slug = Str::slug($row['ten_don_vi']);
            $orm->tenthutruong = $row['ho_ten_thu_truong'];
            $orm->email = $row['email'];
            $orm->SDT = $row['dien_thoai'];
            $orm->website =  $row['website'];
            $orm->hinhanh = $row['hinh_anh'];
            return $orm;
        }
        
       
    }
   
}
