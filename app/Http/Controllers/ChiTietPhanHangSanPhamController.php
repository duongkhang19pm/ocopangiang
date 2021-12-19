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
    public function getDanhSach()
    {
        //$iddoanhnghiep = Auth::user()->doanhnghiep->id;
        $chitiet_phanhang_sanpham = ChiTiet_PhanHang_SanPham::all();
        return view('doanhnghiep.chitiet_phanhang_sanpham.danhsach',compact('chitiet_phanhang_sanpham'));
    }
    public function getThem()
    {
        $phanhang =PhanHang::all();
       
        $sanpham =SanPham::all();
        return view('doanhnghiep.chitiet_phanhang_sanpham.them',compact('phanhang','sanpham'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'phanhang_id'=>['required'],
            'sanpham_id'=>['required'],
            'ngaybatdau'=>['required','date'],
            'ngayketthuc'=>['nullable','date'],

        ]);

        $orm = new ChiTiet_PhanHang_SanPham();
        $orm->phanhang_id = $request ->phanhang_id;
        $orm->sanpham_id = $request ->sanpham_id;
        $orm->ngaybatdau = $request ->ngaybatdau;
        $orm->ngayketthuc = $request ->ngayketthuc;
        $orm ->save();
        return redirect()->route('doanhnghiep.chitiet_phanhang_sanpham');

    }
    public function getSua($id)
    {


    }
    public function postSua(Request $request, $id)
    {

    }
    public function getXoa($id)
    {

    }
}
