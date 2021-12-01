<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
     protected $table = 'nhanvien';
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
    public function DoanhNghiep()
    {
    return $this->belongsTo(DoanhNghiep::class, 'doanhnghiep_id', 'id');
    }
    public function ChucVu()
    {
    return $this->belongsTo(ChucVu::class, 'chucvu_id', 'id');
    }

   
}
