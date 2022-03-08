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
        ->subject('Khôi phục mật khẩu')
        ->line('Bạn vừa yêu cầu ' . config('app.name') . ' khôi phục mật khẩu của mình.')
        ->line('Xin vui lòng nhấn vào nút "Khôi phục mật khẩu" bên dưới để tiến hành cấp mật khẩu mới.')
        ->action('Khôi phục mật khẩu', url(config('app.url') . route('password.reset', $this->token, false)))
        ->line('Nếu bạn không yêu cầu đặt lại mật khẩu, xin vui lòng không làm gì thêm và báo lại 
        cho quản trị hệ thống về vấn đề này.');
    }
}

