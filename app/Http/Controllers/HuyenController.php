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
        $huyen = Huyen::paginate(50);
        return view('admin.huyen.danhsach',compact('huyen'));
    }
   // Nhập từ Excel
     public function postNhap(Request $request)
     {
     Excel::import(new HuyenImport, $request->file('file_excel'));
     
     return redirect()->route('admin.huyen');
     }
}
