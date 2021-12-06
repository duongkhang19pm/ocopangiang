<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    use HasFactory;
    protected $table ='donvitinh';
    protected $fillable = [
        'tendonvitinh', 
    ];
    public function QuyCach()
    {
        return $this->hasMany(QuyCach::class, 'donvitinh_id','id');
    }
    public function SanPham()
    {
        return $this->hasMany(SanPham::class, 'donvitinh_id','id');
    }
}
