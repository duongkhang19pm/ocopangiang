<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHang extends Model
{
    use HasFactory;
    protected $table ='phanhang';
     protected $fillable = [
        'tenphanhang', 'tenphanhang_slug',
    ];
     public function ChiTiet_PhanHang_SanPham()
    {
        return $this->hasMany(ChiTiet_PhanHang_SanPham::class, 'phanhang_id','id');
    }
}
