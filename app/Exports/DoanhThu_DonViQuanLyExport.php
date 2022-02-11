<?php

namespace App\Exports;

use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\TaiKhoan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DoanhThu_DonViQuanLyExport implements FromView
{
    public function view(): View
    {
        return view('exports.doanhthu_donviquanly', [
            
            'doanhthu' =>  DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
                ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
                ->leftJoin('doanhnghiep','doanhnghiep.id','=','sanpham.doanhnghiep_id')
                ->select('doanhnghiep.*',
                        
                           DB::raw('sum(donhang_chitiet.soluongban)  AS tongsoluongban'),
                            DB::raw('sum(donhang_chitiet.dongiaban)  AS tongdongiaban'),
                        )
                ->where([
                    //['donhang.created_at', '>=', $request->dateStart],
                    //['donhang.created_at', '<=', $request->dateEnd],
                    ['donhang_chitiet.tinhtrang_id',10],
                   ['doanhnghiep.donviquanly_id',Auth::user()->donviquanly->id]
                ])
              
           
                ->groupBy('doanhnghiep.id')
                
                ->get()
                ,
                'taikhoan' => TaiKhoan::where('donviquanly_id',Auth::user()->donviquanly->id)->first()
        ]);
    }
}
