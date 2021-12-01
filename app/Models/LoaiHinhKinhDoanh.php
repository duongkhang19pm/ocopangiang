<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiHinhKinhDoanh extends Model
{
    use HasFactory;
    protected $table ='loaihinhkinhdoanh';
     protected $fillable = [
        'tenloaihinhkinhdoanh',
    ];
    public function DoanhNghiep()
    {
        return $this->hasMany(DoanhNghiep::class, 'loaihinhkinhdoanh_id','id');
    }
}
