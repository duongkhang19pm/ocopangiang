<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTiet_PhanHang_SanPham extends Model
{
    use HasFactory;
     protected $table = 'chitiet_phanhang_sanpham';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function PhanHang()
    {
    return $this->belongsTo(PhanHang::class, 'phanhang_id', 'id');
    }

    public function SanPham()
    {
    return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}
