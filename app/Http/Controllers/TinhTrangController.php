<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinhTrang;
class TinhTrangController extends Controller
{
    public function getDanhSach()
    {
        $tinhtrang = TinhTrang::paginate(5);
        return view('admin.tinhtrang.danhsach',compact('tinhtrang'));

    }
    public function getThem()
    {
       
        return view('admin.tinhtrang.them');

    }
    public function postThem(Request $request)
    {
         //kiểm tra 

        $this->validate($request, [
            'tinhtrang' => ['required', 'string', 'max:191','unique:tinhtrang']
        ]);

        //thêm
        $orm = new TinhTrang();
        $orm->tinhtrang = $request->tinhtrang;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.tinhtrang');

    }
    public function getSua($id)
    {
        $tinhtrang = TinhTrang::find($id);
        return view('admin.tinhtrang.sua',compact('tinhtrang'));
    }
    public function postSua(Request $request, $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tinhtrang' => ['required', 'string', 'max:191','unique:tinhtrang,tinhtrang,'.$id]
        ]);

        //thêm
        $orm =  TinhTrang::find($id);
        $orm->tinhtrang = $request->tinhtrang;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.tinhtrang');
    }
    public function getXoa($id)
    {
        $orm = TinhTrang::find($id);
        $orm ->delete();
        return redirect()->route('admin.tinhtrang');
    }
}
