<?php

namespace App\Exports;

use App\Models\SanPham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Auth;
class SanPhamSapHetExport implements FromView
{
    public function view(): View
    {
        return view('exports.sanphamsaphet', [
            'sanpham' => SanPham::query()->where('soluong','<',10 )->where('doanhnghiep_id', Auth::user()->doanhnghiep->id)->get() 
        ]);
    }
}
