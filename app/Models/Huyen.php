<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    use HasFactory;
    protected $table = 'huyen';
    protected $fillable = [
     'tinh_id',
     'tenhuyen',
     ];

    public function Tinh()
    {
    return $this->belongsTo(Tinh::class, 'tinh_id', 'id');
    }

    public function Xa()
    {
    return $this->hasMany(Xa::class, 'xa_id', 'id');
    }
    public function DoanhNghiep()
    {
        return $this->hasMany(DoanhNghiep::class, 'huyen_id','id');
    }
    public function NhanVien()
    {
        return $this->hasMany(NhanVien::class, 'huyen_id','id');
    }
    public function TaiKhoan()
    {
        return $this->hasMany(TaiKhoan::class, 'huyen_id','id');
    }
}
