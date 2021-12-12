<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\BaiViet;
use Gloudemans\Shoppingcart\Facades\Cart;

class TKKhachHangController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome ()
    {   
        $sanpham = SanPham::paginate(12);
        return view('khachhang.index',compact('sanpham'));
    }
    
}
