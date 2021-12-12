<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HinhThucThanhToan;
class HinhThucThanhToanController extends Controller
{
    public function getDanhSach()
    {
        $hinhthucthanhtoan = HinhThucThanhToan::paginate(5);
        return view('admin.hinhthucthanhtoan.danhsach',compact('hinhthucthanhtoan'));

    }
    public function getThem()
    {
       
        return view('admin.hinhthucthanhtoan.them');

    }
    public function postThem(Request $request)
    {
         //kiểm tra 

        $this->validate($request, [
            'hinhthucthanhtoan' => ['required', 'string', 'max:191','unique:hinhthucthanhtoan']
        ]);

        //thêm
        $orm = new HinhThucThanhToan();
        $orm->hinhthucthanhtoan = $request->hinhthucthanhtoan;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.hinhthucthanhtoan');

    }
    public function getSua($id)
    {
        $hinhthucthanhtoan = HinhThucThanhToan::find($id);
        return view('admin.hinhthucthanhtoan.sua',compact('hinhthucthanhtoan'));
    }
    public function postSua(Request $request, $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'hinhthucthanhtoan' => ['required', 'string', 'max:191','unique:hinhthucthanhtoan,hinhthucthanhtoan,'.$id]
        ]);

        //thêm
        $orm =  HinhThucThanhToan::find($id);
        $orm->hinhthucthanhtoan = $request->hinhthucthanhtoan;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.hinhthucthanhtoan');
    }
    public function getXoa($id)
    {
        $orm = HinhThucThanhToan::find($id);
        $orm ->delete();
        return redirect()->route('admin.hinhthucthanhtoan');
    }
}
