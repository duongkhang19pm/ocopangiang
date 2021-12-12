<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
    use HasFactory;
    protected $table = 'xa';
    protected $fillable = [
     'huyen_id',
     'tenxa',
     ];

    public function Huyen()
    {
    return $this->belongsTo(Huyen::class, 'huyen_id', 'id');
    }

    public function DoanhNghiep()
    {
        return $this->hasMany(DoanhNghiep::class, 'xa_id','id');
    }
    public function NhanVien()
    {
        return $this->hasMany(NhanVien::class, 'xa_id','id');
    }
    public function TaiKhoan()
    {
        return $this->hasMany(TaiKhoan::class, 'xa_id','id');
    }
     public function DonHang()
    {
        return $this->hasMany(DonHang::class, 'xa_id','id');
    }
}
