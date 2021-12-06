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

    public function DonViTinh()
    {
    return $this->belongsTo(DonViTinh::class, 'donvitinh_id', 'id');
    }
    public function QuyCach()
    {
    return $this->belongsTo(QuyCach::class, 'quycach_id', 'id');
    }
    public function NhomSanPham()
    {
    return $this->belongsTo(NhomSanPham::class, 'nhomsanpham_id', 'id');
    }
    public function PhanHang()
    {
    return $this->belongsTo(PhanHang::class, 'phanhang_id', 'id');
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
}
