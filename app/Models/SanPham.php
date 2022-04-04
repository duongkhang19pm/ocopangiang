<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    protected $fillable = [
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
       'hinhanh',
       'thumuc',
        'motasanpham',

    ];
  
    public function QuyCach()
    {
    return $this->belongsTo(QuyCach::class, 'quycach_id', 'id');
    }
    public function LoaiSanPham()
    {
    return $this->belongsTo(LoaiSanPham::class, 'loaisanpham_id', 'id');
    }

    public function DoanhNghiep()
    {
    return $this->belongsTo(DoanhNghiep::class, 'doanhnghiep_id', 'id');
    }

    public function DonHang_ChiTiet()
    {
    return $this->hasMany(DonHang_ChiTiet::class, 'sanpham_id', 'id');
    }
     public function ChiTiet_PhanHang_SanPham()
    {
    return $this->hasMany(ChiTiet_PhanHang_SanPham::class, 'sanpham_id', 'id');
    }
      public function DanhGia()
    {
    return $this->hasMany(DanhGia::class, 'sanpham_id', 'id');
    }
    public function SanPhamYeuThich()
    {
    return $this->hasMany(SanPhamYeuThich::class, 'sanpham_id', 'id');
    }
      
}
