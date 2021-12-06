<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyCach extends Model
{
    use HasFactory;
    protected $table = 'quycach';
    protected $fillable = [
        'donvitinh_id','tenquycach',
    ];
    public function DonViTinh()
    {
        return $this->belongsTo(DonViTinh::class, 'donvitinh_id', 'id');
    }
    public function SanPham()
    {
    return $this->hasMany(SanPham::class, 'quycach_id', 'id');
    }
}
