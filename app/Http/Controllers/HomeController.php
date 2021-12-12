<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\DoanhNghiep;
use App\Models\BaiViet;
class HomeController extends Controller
{
    

    public function __construct()
    {
        
    }
    
    public function getHome()
    {
        
         $sanpham = SanPham::paginate(12);
         $doanhnghiep = DoanhNghiep::all();
         $baiviet = BaiViet::all();
        return view('frontend.index',compact('sanpham','doanhnghiep','baiviet'));
    }
    public function getForbidden()
    {
        return view('errors.403');
    }
}
