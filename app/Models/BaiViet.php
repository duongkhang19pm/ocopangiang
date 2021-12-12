<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;
     protected $table = 'baiviet';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public function ChuDe()
    {
    return $this->belongsTo(ChuDe::class, 'chude_id', 'id');
    }
    public function TaiKhoan()
    {
    return $this->belongsTo(TaiKhoan::class, 'taikhoan_id', 'id');
    }

    
}
