<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoHinhKinhDoanh;
class MoHinhKinhDoanhController extends Controller
{
     public function getDanhSach()
    {
        $mohinhkinhdoanh = MohiNhKinhDoanh::paginate(5);
        return view('admin.mohinhkinhdoanh.danhsach',compact('mohinhkinhdoanh'));

    }
    public function getThem()
    {
       
        return view('admin.mohinhkinhdoanh.them');

    }
    public function postThem(Request $request)
    {
         //kiểm tra 

        $this->validate($request, [
            'tenmohinhkinhdoanh' => ['required', 'string', 'max:191','unique:mohinhkinhdoanh']
        ]);

        //thêm
        $orm = new MohiNhKinhDoanh();
        $orm->tenmohinhkinhdoanh = $request->tenmohinhkinhdoanh;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.mohinhkinhdoanh');

    }
    public function getSua($id)
    {
        $mohinhkinhdoanh = MohiNhKinhDoanh::find($id);
        return view('admin.mohinhkinhdoanh.sua',compact('mohinhkinhdoanh'));
    }
    public function postSua(Request $request, $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tenmohinhkinhdoanh' => ['required', 'string', 'max:191','unique:mohinhkinhdoanh,tenmohinhkinhdoanh,'.$id]
        ]);

        //thêm
        $orm =  MohiNhKinhDoanh::find($id);
        $orm->tenmohinhkinhdoanh = $request->tenmohinhkinhdoanh;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.mohinhkinhdoanh');
    }
    public function getXoa($id)
    {
        $orm = MohiNhKinhDoanh::find($id);
        $orm ->delete();
        return redirect()->route('admin.mohinhkinhdoanh');
    }
}
