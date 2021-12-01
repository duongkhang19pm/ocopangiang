<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChucVu;
class ChucVuController extends Controller
{
    public function getDanhSach()
    {
        $chucvu = ChucVu::paginate(5);
        return view('admin.chucvu.danhsach',compact('chucvu'));

    }
    public function getThem()
    {
       
        return view('admin.chucvu.them');

    }
    public function postThem(Request $request)
    {
         //kiểm tra 

        $this->validate($request, [
            'tenchucvu' => ['required', 'string', 'max:191','unique:chucvu']
        ]);

        //thêm
        $orm = new ChucVu();
        $orm->tenchucvu = $request->tenchucvu;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.chucvu');

    }
    public function getSua($id)
    {
        $chucvu = ChucVu::find($id);
        return view('admin.chucvu.sua',compact('chucvu'));
    }
    public function postSua(Request $request, $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tenchucvu' => ['required', 'string', 'max:191','unique:chucvu,tenchucvu,'.$id]
        ]);

        //thêm
        $orm =  ChucVu::find($id);
        $orm->tenchucvu = $request->tenchucvu;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.chucvu');
    }
    public function getXoa($id)
    {
        $orm = ChucVu::find($id);
        $orm ->delete();
        return redirect()->route('admin.chucvu');
    }
}
