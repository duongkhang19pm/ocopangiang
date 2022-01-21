<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DanhGia;
use App\Models\SanPham;
class DanhGiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach($tensanpham_slug ='')
    {        
        if(empty($tensanpham_slug))
        {
            $danhgia = DanhGia::all();

        }
        else
        {
            $sanpham = SanPham::where('tensanpham_slug',$tensanpham_slug)->first();
            $danhgia = DanhGia::where('sanpham_id',$sanpham->id)->get();

        }
        

        return view('doanhnghiep.danhgia.danhsach',compact('danhgia','sanpham'));
    }
    public function getHienThi($id)
    {
        $orm = DanhGia::find($id);
        $orm->hienthi = 1 - $orm->hienthi;
        
        $orm->save();
        $sanpham = SanPham::find($orm->sanpham_id);
       
         return redirect()->route('doanhnghiep.danhgia',$sanpham->tensanpham_slug);

    }
      public function getXoa($id)
    {
        $orm = DanhGia::find($id);
        $orm->delete();

        $sanpham = SanPham::find($orm->sanpham_id);
       
         return redirect()->route('doanhnghiep.danhgia',$sanpham->tensanpham_slug);
    }
}
