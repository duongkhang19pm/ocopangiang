<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;
    protected $table = 'donhang';
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
    public function HinhThucThanhToan()
    {
    return $this->belongsTo(HinhThucThanhToan::class, 'hinhthucthanhtoan_id', 'id');
    }
    public function TaiKhoan()
    {
    return $this->belongsTo(TaiKhoan::class, 'taikhoan_id', 'id');
    }
    public function TinhTrang()
    {
    return $this->belongsTo(TinhTrang::class, 'tinhtrang_id', 'id');
    }
   
    public function DonHang_ChiTiet()
    {
    return $this->hasMany(DonHang_ChiTiet::class, 'donhang_id', 'id');
    }
}
