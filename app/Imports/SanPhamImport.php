<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\SanPham;
use App\Models\QuyCach;
use App\Models\DoanhNghiep;
use App\Models\LoaiSanPham;
use App\Models\ChiTiet_PhanHang_SanPham;
use Illuminate\Support\Facades\Auth;
use Carbon;
class SanPhamImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
     {
        $sp= SanPham::where('tensanpham_slug',Str::slug($row['ten_san_pham']))->first();
        $loaisanpham= LoaiSanPham::where('tenloai',$row['loai_san_pham'])->first();
            $quycach= QuyCach::where('tenquycach',$row['quy_cach'])->first();
        $ngaybatdau =  \Carbon\Carbon::parse($row['ngay_bat_dau'])->format('Y-m-d');

        $ngayketthuc = \Carbon\Carbon::parse($row['ngay_ket_thuc'])->format('Y-m-d') ;
        if(empty($sp))
        {
            
           
            $sanpham = SanPham::create([

                'loaisanpham_id' => $loaisanpham->id,
                'quycach_id' => $quycach->id,
                'doanhnghiep_id' => Auth::user()->doanhnghiep->id,
                'tensanpham' => $row['ten_san_pham'],
                'tensanpham_slug' =>  Str::slug($row['ten_san_pham']),
                'nguyenlieu' => $row['nguyen_lieu'],
                'tieuchuan' => $row['tieu_chuan'],
                'dieukienluutru' => $row['dieu_kien_luu_tru'],
                'dieukienvanchuyen' => $row['dieu_kien_van_chuyen'],
                'khoiluongrieng' => $row['khoi_luong_rieng'],
                'soluong' => $row['so_luong'],
                'dongia' => $row['don_gia'],
                'hansudung' => $row['han_su_dung'],
                'hansudungsaumohop' => $row['han_su_dung_sau_mo_hop'],
                'hinhanh' => $row['hinh_anh_san_pham_dai_dien'],
                'thumuc' => $row['hinh_anh_san_pham_dinh_kem'],
    
            ]);
            $chitiet_phanhang_sanpham = ChiTiet_PhanHang_SanPham::create([
                'phanhang_id' => $row['phan_hang'],
                'sanpham_id' =>$sanpham->id,
                'ngaybatdau' => $ngaybatdau,
                'ngayketthuc' => $ngayketthuc,
    
            ]);
           
            return $sanpham;
        }
        else 
        {
            $orm = SanPham::find($sp->id);
        
            $orm->loaisanpham_id = $loaisanpham->id;
        
            $orm->quycach_id = $quycach->id;
            $orm->doanhnghiep_id = Auth::user()->doanhnghiep->id;
        
            $orm->tensanpham = $row['ten_san_pham'];
            $orm->tensanpham_slug =  Str::slug($row['ten_san_pham']);
            $orm->nguyenlieu =  $row['nguyen_lieu'];
            $orm->tieuchuan  = $row['tieu_chuan'];
            $orm->dieukienvanchuyen = $row['dieu_kien_van_chuyen'];
            $orm->dieukienluutru = $row['dieu_kien_luu_tru'];
            $orm->khoiluongrieng = $row['khoi_luong_rieng'];
            $orm->soluong = ($row['so_luong'] + $orm->soluong);
            $orm->dongia = $row['don_gia'];
            $orm->hansudung = $row['han_su_dung'];
            $orm->hansudungsaumohop = $row['han_su_dung_sau_mo_hop'];
            $orm->hinhanh = $row['hinh_anh_san_pham_dai_dien'];
            $orm->thumuc =  $row['hinh_anh_san_pham_dinh_kem'];
            $orm->motasanpham = null ;

            $ct = ChiTiet_PhanHang_SanPham::where('sanpham_id',$sp->id)->delete();
            $ct = new ChiTiet_PhanHang_SanPham();
            $ct->phanhang_id = $row['phan_hang'];
            $ct->sanpham_id = $sp->id;
            $ct->ngaybatdau = $ngaybatdau;
            $ct->ngayketthuc =$ngayketthuc;
            $ct->save();
      
            
           
            return $orm;
        }
        
     }
}
