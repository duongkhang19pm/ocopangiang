<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhThucThanhToan extends Model
{
    use HasFactory;
     protected $table ='hinhthucthanhtoan';
    protected $fillable = [
        'hinhthucthanhtoan', 
    ];
    public function DonHang()
    {
        return $this->hasMany(DonHang::class, 'hinhthucthanhtoan_id','id');
    }
}
