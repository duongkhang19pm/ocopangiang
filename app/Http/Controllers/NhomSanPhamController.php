<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhomSanPham;
use Str;
class NhomSanPhamController extends Controller
{
    public function getDanhSach()
    {
        $nhomsanpham = NhomSanPham::paginate(10);
        return view('admin.nhomsanpham.danhsach',compact('nhomsanpham'));
    }
    public function getThem()
    {
        return view('admin.nhomsanpham.them');
    }
    public function postThem(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
            'tennhom' => ['required', 'string', 'max:191','unique:nhomsanpham']
        ]);

        //thêm
        $orm = new NhomSanPham();
        $orm->tennhom = $request->tennhom;
        $orm->tennhom_slug = Str::slug($request->tennhom,'-');
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.nhomsanpham');


       
    }
    public function getSua($id)
    {
        $nhomsanpham = NhomSanPham::find($id);
        return view('admin.nhomsanpham.sua',compact('nhomsanpham'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tennhom' => ['required', 'string', 'max:191','unique:nhomsanpham,tennhom,'.$request->id]
        ]);
        // sửa
        $orm = NhomSanPham::find($id);
        $orm->tennhom = $request->tennhom;
        $orm->tennhom_slug = Str::slug($request->tennhom,'-');
        $orm->save();
        //quay về danh sách
        return redirect()->route('admin.nhomsanpham');
    }
  public function getXoa($id)
    {
        $orm = NhomSanPham::find($id);
        $orm->delete();
        return redirect()->route('admin.nhomsanpham'); 
    }
}
