<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhanHang;
use Str;
class PhanHangController extends Controller
{
     public function getDanhSach()
    {
        $phanhang = PhanHang::paginate(10);
        return view('admin.phanhang.danhsach',compact('phanhang'));
    }
    public function getThem()
    {
       
        return view('admin.phanhang.them');
    }
    public function postThem(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
        
            'tenphanhang' => ['required', 'string', 'max:191','unique:phanhang']
        ]);

        //thêm
        $orm = new PhanHang();
        $orm->tenphanhang = $request->tenphanhang;
        $orm->tenphanhang_slug = Str::slug($request->tenphanhang,'-');
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.phanhang');
    }
    public function getSua($id)
    {
        $phanhang = PhanHang::find($id);
        return view('admin.phanhang.sua',compact('phanhang'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tenphanhang' => ['required', 'string', 'max:191','unique:phanhang,tenphanhang,'.$id]
        ]);

        // Sửa
        $orm = PhanHang::find($id);
        $orm->tenphanhang = $request->tenphanhang;
        $orm->tenphanhang_slug = Str::slug($request->tenphanhang,'-');
        $orm->save();
        //quay về danh sách
        return redirect()->route('admin.phanhang');
    }
    public function getXoa($id)
    {
        $orm = PhanHang::find($id);
        $orm->delete();
        return redirect()->route('admin.phanhang'); 
    }
}
