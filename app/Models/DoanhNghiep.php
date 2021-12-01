<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanhNghiep extends Model
{
    use HasFactory;
    protected $table = 'doanhnghiep';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function Tinh()
    {
    return $this->belongsTo(Tinh::class, 'tinh_id', 'id');
    }
    public function Huyen()
    {
    return $this->belongsTo(Huyen::class, 'huyen_id', 'id');
    }
    public function Xa()
    {
    return $this->belongsTo(Xa::class, 'xa_id', 'id');
    }
    public function MoHinhKinhDoanh()
    {
    return $this->belongsTo(MoHinhKinhDoanh::class, 'mohinhkinhdoanh_id', 'id');
    }
    public function LoaiHinhKinhDoanh()
    {
    return $this->belongsTo(LoaiHinhKinhDoanh::class, 'loaihinhkinhdoanh_id', 'id');
    }

    public function TaiKhoan()
    {
    return $this->hasMany(TaiKhoan::class, 'doanhnghiep_id', 'id');
    }
    public function SanPham()
    {
    return $this->hasMany(SanPham::class, 'doanhnghiep_id', 'id');
    }
}
