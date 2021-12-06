<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TaiKhoan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'taikhoan';
    protected $fillable = [
        'donviquanly_id', 'doanhnghiep_id','chucvu_id','tinh_id','huyen_id','xa_id', 'name', 'username', 'email','phone', 'privilege', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function DonViQuanLy()
    {
        return $this->belongsTo(DonViQuanLy::class, 'donviquanly_id', 'id');
    }
    public function ChucVu()
    {
        return $this->belongsTo(ChucVu::class, 'chucvu_id', 'id');
    }
    public function DoanhNghiep()
    {
        return $this->belongsTo(DoanhNghiep::class, 'doanhnghiep_id', 'id');
    }
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
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
