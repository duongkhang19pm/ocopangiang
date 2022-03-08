<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\DonViQuanLy;
use App\Models\TaiKhoan;

class TKAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome()
    {
        $donviquanly = DonViQuanLy::all();
        $taikhoan_quanly = TaiKhoan::where('privilege','admin')->where('kichhoat',0)->get();
        $taikhoan_donvi = TaiKhoan::where('privilege','donviquanly')->where('kichhoat',0)->get();
        $taikhoan_khachhang = TaiKhoan::where('privilege','user')->where('kichhoat',0)->get();
        
        return view('admin.index',compact('donviquanly','taikhoan_quanly','taikhoan_donvi','taikhoan_khachhang'));
    }
    
}
