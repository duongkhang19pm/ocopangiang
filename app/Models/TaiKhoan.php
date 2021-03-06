<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;


class TaiKhoan extends Authenticatable
{
    use HasFactory, Notifiable;

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
    public function BaiViet()
    {
    return $this->hasMany(BaiViet::class, 'taikhoan_id', 'id');
    }
    public function DonHang()
    {
    return $this->hasMany(DonHang::class, 'taikhoan_id', 'id');
    }
     public function DanhGia()
    {
    return $this->hasMany(DanhGia::class, 'taikhoan_id', 'id');
    }
    public function SanPhamYeuThich()
    {
    return $this->hasMany(SanPhamYeuThich::class, 'taikhoan_id', 'id');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
}
class CustomResetPasswordNotification extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->subject('Kh??i ph???c m???t kh???u')
        ->line('B???n v???a y??u c???u ' . config('app.name') . ' kh??i ph???c m???t kh???u c???a m??nh.')
        ->line('Xin vui l??ng nh???n v??o n??t "Kh??i ph???c m???t kh???u" b??n d?????i ????? ti???n h??nh c???p m???t kh???u m???i.')
        ->action('Kh??i ph???c m???t kh???u', url(config('app.url') . route('password.reset', $this->token, false)))
        ->line('N???u b???n kh??ng y??u c???u ?????t l???i m???t kh???u, xin vui l??ng kh??ng l??m g?? th??m v?? b??o l???i 
        cho qu???n tr??? h??? th???ng v??? v???n ????? n??y.');
    }
}

