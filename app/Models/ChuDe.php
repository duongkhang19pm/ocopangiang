<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    use HasFactory;
    protected $table ='chude';

    public function BaiViet()
    {
        return $this->hasMany(BaiViet::class, 'chude_id','id');
    }
}
