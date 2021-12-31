<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChiTiet_PhanHang_SanPham;
use App\Models\SanPham;
use App\Models\PhanHang;
class ChiTietPhanHangSanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
}
