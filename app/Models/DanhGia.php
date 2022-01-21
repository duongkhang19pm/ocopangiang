<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
     protected $table = 'danhgia';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function SanPham()
    {
    return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
    public function TaiKhoan()
    {
    return $this->belongsTo(TaiKhoan::class, 'taikhoan_id', 'id');
    }
}
