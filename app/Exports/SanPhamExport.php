<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SanPhamExport implements FromView
{
   public function view(): View
    {
        return view('exports.sanpham', [
            
            'sanpham' =>  SanPham::where('doanhnghiep_id', Auth::user()->doanhnghiep->id)->get()
        ]);
    }
}
