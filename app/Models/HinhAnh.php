<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnh extends Model
{
    use HasFactory;
     protected $table = 'hinhanh';
     protected $fillable = [
      'sanpham_id', 'thucmuc','hinhanh'
    ];


    public function SanPham()
    {
    return $this->belongsTo(SanPham::class, 'sanpham_id', 'id');
    }
}
