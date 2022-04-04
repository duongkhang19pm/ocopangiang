<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Huyen;
use App\Imports\HuyenImport;
use Excel;
class HuyenController extends Controller
{
    public function getDanhSach()
    {
        $huyen = Huyen::all();
        return view('admin.huyen.danhsach',compact('huyen'));
    }
   // Nhập từ Excel
     public function postNhap(Request $request)
     {
     Excel::import(new HuyenImport, $request->file('file_excel'));
     
     return redirect()->route('admin.huyen');
     }
     public function getSua($id)
    {
        $huyen = Huyen::find($id);
        return view('admin.huyen.sua',compact('huyen'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'phivanchuyen' => ['required','numeric']
        ]);
        // sửa
        $orm = Huyen::find($id);
        
        $orm->phivanchuyen = $request->phivanchuyen;
        $orm->save();
        //quay về danh sách
        return redirect()->route('admin.huyen');
    }
}
