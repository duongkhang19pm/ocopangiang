<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Models\SanPham;
use App\Models\ChiTiet_PhanHang_SanPham;
use Illuminate\Support\Facades\Auth;
class SanPhamImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
     {
        /*
         return new SanPham([
        
        'loaisanpham_id' => $row['loaisanpham_id'],
       
        'quycach_id' => $row['quycach_id'],
        'doanhnghiep_id' => $row['doanhnghiep_id'],
       
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
        
        ]);
            */
        $sanpham = SanPham::create([

            'loaisanpham_id' => $row['loai_san_pham'],
            'quycach_id' => $row['quy_cach'],
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
            'ngaybatdau' => $row['ngay_bat_dau'],
            'ngayketthuc' => $row['ngay_ket_thuc'],

        ]);
       
        return $sanpham;
     }
}
