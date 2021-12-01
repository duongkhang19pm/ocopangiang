<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiHinhKinhDoanh;
class LoaiHinhKinhDoanhController extends Controller
{
    public function getDanhSach()
    {
        $loaihinhkinhdoanh = LoaiHinhKinhDoanh::paginate(5);
        return view('admin.loaihinhkinhdoanh.danhsach',compact('loaihinhkinhdoanh'));

    }
    public function getThem()
    {
       
        return view('admin.loaihinhkinhdoanh.them');

    }
    public function postThem(Request $request)
    {
         //kiểm tra 

        $this->validate($request, [
            'tenloaihinhkinhdoanh' => ['required', 'string', 'max:191','unique:loaihinhkinhdoanh']
        ]);

        //thêm
        $orm = new LoaiHinhKinhDoanh();
        $orm->tenloaihinhkinhdoanh = $request->tenloaihinhkinhdoanh;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.loaihinhkinhdoanh');

    }
    public function getSua($id)
    {
        $loaihinhkinhdoanh = LoaiHinhKinhDoanh::find($id);
        return view('admin.loaihinhkinhdoanh.sua',compact('loaihinhkinhdoanh'));
    }
    public function postSua(Request $request, $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tenloaihinhkinhdoanh' => ['required', 'string', 'max:191','unique:loaihinhkinhdoanh,tenloaihinhkinhdoanh,'.$id]
        ]);

        //thêm
        $orm =  LoaiHinhKinhDoanh::find($id);
        $orm->tenloaihinhkinhdoanh = $request->tenloaihinhkinhdoanh;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.loaihinhkinhdoanh');
    }
    public function getXoa($id)
    {
        $orm = LoaiHinhKinhDoanh::find($id);
        $orm ->delete();
        return redirect()->route('admin.loaihinhkinhdoanh');
    }
}
