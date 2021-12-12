<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomSanPham extends Model
{
    use HasFactory;
    protected $table ='nhomsanpham';
    protected $fillable = [
        'tennhom', 'tennhom_slug',
    ];
    public function LoaiSanPham()
    {
        return $this->hasMany(LoaiSanPham::class, 'nhomsanpham_id','id');
    }
    
}
