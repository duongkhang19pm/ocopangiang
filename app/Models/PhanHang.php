<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHang extends Model
{
    use HasFactory;
    protected $table ='phanhang';
     public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'phanhang_id','id');
    }
}
