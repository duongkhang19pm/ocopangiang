<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Xa;
use App\Imports\XaImport;
use Excel;
class XaController extends Controller
{
    public function getDanhSach()
    {
        $xa = Xa::all();
        return view('admin.xa.danhsach',compact('xa'));
    }
   // Nhập từ Excel
     public function postNhap(Request $request)
     {
     Excel::import(new XaImport, $request->file('file_excel'));
     
     return redirect()->route('admin.xa');
     }
}

