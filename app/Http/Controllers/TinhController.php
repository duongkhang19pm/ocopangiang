<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tinh;
use App\Imports\TinhImport;
use Excel;
class TinhController extends Controller
{
    public function getDanhSach()
    {
        $tinh = Tinh::paginate(25);
        return view('admin.tinh.danhsach',compact('tinh'));
    }

        // Nhập từ Excel
     public function postNhap(Request $request)
     {
         Excel::import(new TinhImport, $request->file('file_excel'));
         
         return redirect()->route('admin.tinh');
     }
      
}
