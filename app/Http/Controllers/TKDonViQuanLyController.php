<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use App\Models\DoanhNghiep;
use App\Models\DonViQuanLy;
use App\Models\BaiViet;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\SanPham;
use Illuminate\Support\Facades\DB;
class TKDonViQuanLyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome ()
    {
        if(Auth::user()->kichhoat === 0  )
        {
            $taikhoan = TaiKhoan::where('donviquanly_id',Auth::user()->donviquanly_id)->where('privilege', 'doanhnghiep')->get();
            $doanhnghiep = DoanhNghiep::where('donviquanly_id', Auth::user()->donviquanly_id)->get();
            $baiviet = BaiViet::where('taikhoan_id', Auth::user()->id)->get();
            $tongdoanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
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
                
                ->get();
            




            return view('donviquanly.index',compact('taikhoan','doanhnghiep','baiviet','tongdoanhthu'));
        }
         elseif(Auth::user()->kichhoat === 1)
        {
            Auth::logout();
            return redirect()->route('login')->with('warning', 'Tài khoản của bạn đã bị tạm khóa. Vui lòng liên hệ quản trị viên');
        }
    }
}
