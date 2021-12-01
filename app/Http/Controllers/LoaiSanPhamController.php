<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiSanPham;
use App\Models\NhomSanPham;
use Str;
class LoaiSanPhamController extends Controller
{
    public function getDanhSach()
    {
        $loaisanpham = LoaiSanPham::paginate(10);
        return view('admin.loaisanpham.danhsach',compact('loaisanpham'));
    }
    public function getThem()
    {
        $nhomsanpham = NhomSanPham::all();
        return view('admin.loaisanpham.them',compact('nhomsanpham'));
    }
    public function postThem(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
            'nhomsanpham_id' => ['required'],
            'tenloai' => ['required', 'string', 'max:191','unique:loaisanpham']
        ]);

        //thêm
        $orm = new LoaiSanPham();
        $orm->nhomsanpham_id = $request->nhomsanpham_id;
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai,'-');
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.loaisanpham');
    }
    public function getSua($id)
    {
        $loaisanpham = LoaiSanPham::find($id);
        $nhomsanpham = NhomSanPham::all();
        return view('admin.loaisanpham.sua',compact('loaisanpham','nhomsanpham'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'nhomsanpham_id' => ['required'],
            'tenloai' => ['required', 'string', 'max:191','unique:loaisanpham,tenloai,'.$id]
        ]);

        // Sửa
        $orm = LoaiSanPham::find($id);
        $orm->nhomsanpham_id = $request->nhomsanpham_id;
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai,'-');
        $orm->save();
        //quay về danh sách
        return redirect()->route('admin.loaisanpham');
    }
    public function getXoa($id)
    {
        $orm = LoaiSanPham::find($id);
        $orm->delete();
        return redirect()->route('admin.loaisanpham'); 
    }
}
