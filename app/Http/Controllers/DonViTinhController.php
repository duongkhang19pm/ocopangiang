<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonViTinh;
class DonViTinhController extends Controller
{
     public function getDanhSach()
    {
        $donvitinh = DonViTinh::paginate(5);
        return view('admin.donvitinh.danhsach',compact('donvitinh'));
    }
    public function getThem()
    {
        return view('admin.donvitinh.them');
    }
    public function postThem(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
            'tendonvitinh' => ['required', 'string', 'max:191','unique:donvitinh']
        ]);

        //thêm
        $orm = new DonViTinh();
        $orm->tendonvitinh = $request->tendonvitinh;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.donvitinh');


       
    }
    public function getSua($id)
    {
        $donvitinh = DonViTinh::find($id);
        return view('admin.donvitinh.sua',compact('donvitinh'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'tendonvitinh' => ['required', 'string', 'max:191','unique:donvitinh,tendonvitinh,'.$request->id]
        ]);
        // sửa
        $orm = DonViTinh::find($id);
        $orm->tendonvitinh = $request->tendonvitinh;
        $orm->save();
        //quay về danh sách
        return redirect()->route('admin.donvitinh');
    }
  public function getXoa($id)
    {
        $orm = DonViTinh::find($id);
        $orm->delete();
        return redirect()->route('admin.donvitinh'); 
    }
}
