<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\NhomSanPham;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
class TKKhachHangController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome ()
    {   
        $nhomsanpham = NhomSanPham::all();
        $taikhoan = TaiKhoan::where('id',Auth::user()->id)->first();
       return view('khachhang.index',compact('nhomsanpham','taikhoan'));
    }
    
}
