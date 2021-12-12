<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    use HasFactory;
    protected $table ='tinh';
    protected $fillable = [
     'tentinh',
     ];

    public function DoanhNghiep()
    {
        return $this->hasMany(DoanhNghiep::class, 'tinh_id','id');
    }
    public function Huyen()
    {
        return $this->hasMany(Huyen::class, 'tinh_id','id');
    }
    public function NhanVien()
    {
        return $this->hasMany(NhanVien::class, 'tinh_id','id');
    }
    public function TaiKhoan()
    {
        return $this->hasMany(TaiKhoan::class, 'tinh_id','id');
    }
     public function DonHang()
    {
        return $this->hasMany(DonHang::class, 'tinh_id','id');
    }
}
