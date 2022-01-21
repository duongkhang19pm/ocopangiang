<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoanhNghiep extends Model
{
    use HasFactory;
    protected $table = 'doanhnghiep';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

     protected $fillable = [
        'tinh_id',
     'huyen_id',
     'xa_id',
     'tenduong',
     'mohinhkinhdoanh_id',
     'loaihinhkinhdoanh_id',
     'donviquanly_id',
     'masothue',
     'tendoanhnghiep',
     'tendoanhnghiep_slug',
     'email',
     'SDT',
     'website',
     'ngaythanhlap',
     'hinhanh',
     'kinhdo',
     'vido',

     ];
   public $appends = [
        'coordinate', 'map_popup_content',
    ];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('outlet.outlet'),
        ]);
        $link = '<a href="'.route('frontend.doanhnghiep', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }
   public function creator()
    {
        return $this->belongsTo(User::class);
    }

     public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }

    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.name').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('outlet.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
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
    public function MoHinhKinhDoanh()
    {
    return $this->belongsTo(MoHinhKinhDoanh::class, 'mohinhkinhdoanh_id', 'id');
    }
    public function LoaiHinhKinhDoanh()
    {
    return $this->belongsTo(LoaiHinhKinhDoanh::class, 'loaihinhkinhdoanh_id', 'id');
    }
    public function DonViQuanLy()
    {
    return $this->belongsTo(DonViQuanLy::class, 'donviquanly_id', 'id');
    }
    public function TaiKhoan()
    {
    return $this->hasMany(TaiKhoan::class, 'doanhnghiep_id', 'id');
    }
    public function SanPham()
    {
    return $this->hasMany(SanPham::class, 'doanhnghiep_id', 'id');
    }
    public function BaiViet()
    {
    return $this->hasMany(BaiViet::class, 'doanhnghiep_id', 'id');
    }
}
