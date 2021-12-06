<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DonViTinh;
use App\Models\QuyCach;
class QuyCachController extends Controller
{
    public function getDanhSach()
    {
        $quycach = QuyCach::paginate(10);
        return view('admin.quycach.danhsach',compact('quycach'));
    }
    public function getThem()
    {
        $donvitinh = DonViTinh::all();
        return view('admin.quycach.them',compact('donvitinh'));
    }
    public function postThem(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
            'donvitinh_id' => ['required'],
            'tenquycach' => ['required', 'string', 'max:191','unique:quycach']
        ]);

        //thêm
        $orm = new QuyCach();
        $orm->donvitinh_id = $request->donvitinh_id;
        $orm->tenquycach = $request->tenquycach;
        $orm->save();

         //quay về danh sách
        return redirect()->route('admin.quycach');
    }
    public function getSua($id)
    {
        $quycach = QuyCach::find($id);
        $donvitinh = DonViTinh::all();
        return view('admin.quycach.sua',compact('quycach','donvitinh'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'donvitinh_id' => ['required'],
            'tenquycach' => ['required', 'string', 'max:191','unique:quycach,tenquycach,'.$id]
        ]);

        // Sửa
        $orm = QuyCach::find($id);
        $orm->donvitinh_id = $request->donvitinh_id;
        $orm->tenquycach = $request->tenquycach;
        $orm->save();
        //quay về danh sách
        return redirect()->route('admin.quycach');
    }
    public function getXoa($id)
    {
        $orm = QuyCach::find($id);
        $orm->delete();
        return redirect()->route('admin.quycach'); 
    }
}
