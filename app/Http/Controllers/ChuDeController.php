<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChuDe;
use Str;
class ChuDeController extends Controller
{
    public function getDanhSach()
    {
        $chude = ChuDe::paginate(10);
        return view('admin.chude.danhsach',compact('chude'));
    }
    public function getThem()
    {
        return view('admin.chude.them');
    }
    public function postThem(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
            'tenchude' => ['required', 'string', 'max:191','unique:chude']
        ]);

        //thêm
        $orm = new ChuDe();
        $orm->tenchude = $request->tenchude;
        $orm->tenchude_slug = Str::slug($request->tenchude,'-');
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.chude');


       
    }
    public function getSua($id)
    {
        $chude = ChuDe::find($id);
        return view('admin.chude.sua',compact('chude'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tenchude' => ['required', 'string', 'max:191','unique:chude,tenchude,'.$request->id]
        ]);
        // sửa
        $orm = ChuDe::find($id);
        $orm->tenchude = $request->tenchude;
        $orm->tenchude_slug = Str::slug($request->tenchude,'-');
        $orm->save();
        //quay về danh sách
        return redirect()->route('admin.chude');
    }
  public function getXoa($id)
    {
        $orm = ChuDe::find($id);
        $orm->delete();
        return redirect()->route('admin.chude'); 
    }
}
