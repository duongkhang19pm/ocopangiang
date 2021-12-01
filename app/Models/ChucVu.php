<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    use HasFactory;
    protected $table = 'chucvu';
    protected $fillable = [
        'tenchucvu', 
    ];
    public function NhanVien ()
    {
        return $this->hasMany(NhanVien::class,'chucvu_id','id');
    }
}
