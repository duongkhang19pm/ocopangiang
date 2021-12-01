<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoHinhKinhDoanh extends Model
{
    use HasFactory;
    protected $table ='mohinhkinhdoanh';
     protected $fillable = [
        'tenmohinhkinhdoanh',
    ];
    public function DoanhNghiep()
    {
        return $this->hasMany(DoanhNghiep::class, 'mohinhkinhdoanh_id','id');
    }
}
