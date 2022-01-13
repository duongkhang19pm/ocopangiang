<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonViQuanLy extends Model
{
    use HasFactory;
   protected $table = 'donviquanly';
    protected $fillable = [
     'tinh_id',
     'huyen_id',
     'xa_id',
     'tenduong',
     'tendonviquanly',
     'tendonviquanly_slug',
     'tenthutruong',
     'email',
     'SDT',
     'website',
     'hinhanh',
     ];

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
    public function TaiKhoan()
    {
    return $this->hasMany(TaiKhoan::class, 'donviquanly_id', 'id');
    }
     public function DoanhNghiep()
    {
    return $this->hasMany(DoanhNghiep::class, 'doanhnghiep_id', 'id');
    }
   
}
