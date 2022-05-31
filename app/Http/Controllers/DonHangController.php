<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinhTrang;
use App\Models\DonHang;
use App\Models\DonHang_ChiTiet;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\SanPham;
use App\Models\Xa;
use App\Models\HinhThucThanhToan;
use App\Models\DoanhNghiep;
use App\Models\DonViQuanLy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Exports\DoanhThu_DonViQuanLyExport;
use Excel;

class DonHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     // Xuất ra Excel
     public function getXuat()
     {

        return Excel::download(new DoanhThu_DonViQuanLyExport, 'danh-sach-doanh-thu-cac-doanh-nghiep.xlsx');
     }
    public function getDanhSach()
    {
         $donhang = DonHang::orderBy('created_at', 'desc')->get();
        return view('doanhnghiep.donhang.danhsach', compact('donhang'));
    }
    public function getDanhSach_DH_Ngay()
    {
        $date = Carbon::today();//lay ngay hien tai
        $donhang = DonHang::whereBetween('donhang.created_at', [$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
                    ->orderBy('created_at', 'desc')->get();
        
        
        return view('doanhnghiep.donhang.donhangngay', compact('donhang'));
    }
    public function getDanhSach_DH_Moi()
    {
       
        $donhang = DonHang::orderBy('created_at', 'desc')->get();
        
        
        return view('doanhnghiep.donhang.moi', compact('donhang'));
    }
     public function postTrangThai(Request $request, $id)
    {
        
        $orm = DonHang_ChiTiet::find($id);
        if($request->select == 10 || $request->select1 == 10 )
            {
                $orm->tinhtrang_id = 10;
                $orm->save();

            }
            elseif($request->select == 9 || $request->select1 == 9) 
            {
                $orm->tinhtrang_id = 9;
                $orm->save();
            }
            elseif($request->select == 8 || $request->select1 == 8) 
            {
                $orm->tinhtrang_id = 8;
                $orm->save();
            }
            elseif($request->select == 7 || $request->select1 == 7) 
            {
                $orm->tinhtrang_id = 7;
                $orm->save();       
            }
            elseif($request->select == 6 || $request->select1 == 6) 
            {
                $orm->tinhtrang_id = 6;
                $orm->save();     
            }
            elseif($request->select == 5 || $request->select1 == 5)  
            {
                $orm->tinhtrang_id = 5;
                $orm->save();  
            }
            elseif($request->select == 4 || $request->select1 == 4) 
            {
                $orm->tinhtrang_id = 4;
                $orm->save();      
            }
            elseif($request->select == 3 || $request->select1 == 3) 
            {
                $orm->tinhtrang_id = 3;
                $orm->save(); 
                $sanpham = SanPham::where('id',$orm->sanpham_id)->first();
                $sanpham->soluong = $sanpham->soluong +$orm->soluongban;
                $sanpham->save();      
            }
            elseif($request->select == 2 || $request->select1 == 2) 
            {
                $orm->tinhtrang_id = 2;
                $orm->save();
            }
            else
            {
                $orm->tinhtrang_id = 1;
                $orm->save();
            }
             return redirect()->route('doanhnghiep.donhang');
       
       
    }
      public function getSua($id)
    {
        $donhang = DonHang::find($id);
        $chitiet = DonHang_ChiTiet::where('donhang_id', $donhang->id)->get();
        foreach ($chitiet as $value)
        {

       
            if($value->tinhtrang_id <= 3)
            {
                $tinhtrang = TinhTrang::all();
                $tinh = Tinh::all();
                $huyen = Huyen::all();
                $xa = Xa::all();
                $hinhthucthanhtoan = HinhThucThanhToan::all();
                $tinhtrang = TinhTrang::all();
                return view('doanhnghiep.donhang.sua', compact('donhang', 'tinhtrang','tinh','huyen','xa','hinhthucthanhtoan','tinhtrang'));
            }
            else
            {
            
                return redirect()->route('doanhnghiep.donhang')->with('status','Đơn Hàng Trong Tình Trạng  Không Thể Cập Nhật!');
            
            }
        }
        
    }
    public function getHuyen(Request $request)
    {
        $huyen = Huyen::where("tinh_id", $request->tinh_id)->pluck("tenhuyen", "id");
        return response()->json($huyen);
    }

    public function getXa(Request $request)
    {
        $xa = Xa::where("huyen_id", $request->huyen_id)->pluck("tenxa", "id");
        return response()->json($xa);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'tinhtrang_id' => ['required'],
            'tinh_id' => ['required'],
            'huyen_id' => ['required'],
            'xa_id' => ['required'],
            'dienthoaigiaohang' => ['required' ,'string','min:10','max:12'],
            'hoten' => ['required','string','max:191'],
           'email'=>['required','email:rfc,dns'],
        ]);
        
        $orm = DonHang::find($id);
        $orm->tinhtrang_id = $request->tinhtrang_id;
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->taikhoan_id = $request->taikhoan_id;
        $orm->hinhthucthanhtoan_id = $request->hinhthucthanhtoan_id;
        $orm->tenduong = $request->tenduong;
        $orm->hoten = $request->hoten;
        $orm->email = $request->email;
        $orm->dienthoaigiaohang = $request->dienthoaigiaohang;
        $orm->ghichu = $request->ghichu;
        $orm->save();
        
        return redirect()->route('doanhnghiep.donhang');
    }
    
    public function getXoa($id)
    {
        $donhang = DonHang::find($id);
        $chitiet = DonHang_ChiTiet::where('donhang_id', $donhang->id)->get();
        foreach ($chitiet as $value)
        {
            if($donhang->tinhtrang_id == 1)
            {
                $chitiet = DonHang_ChiTiet::where('donhang_id', $donhang->id)->delete();
            
                $donhang->delete();
                return redirect()->route('doanhnghiep.donhang');
            }
            else
            {
               
                return redirect()->route('doanhnghiep.donhang')->with('status','Đơn Hàng Trong Tình Trạng  Không Thể Xóa!');
            }
        }
        
      
    }
    public function getDoanhThu (Request $request)
    {

        $doanhnghiep = DoanhNghiep::where('id',Auth::user()->doanhnghiep->id)->first();
         if($request->dateStart != '' && $request->dateEnd != '')
        {
            $doanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
            ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->select('sanpham.*',DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'),'donhang_chitiet.dongiaban as dongiasanpham')
            ->where([
                //['donhang.created_at', '>=', $request->dateStart],
                //['donhang.created_at', '<=', $request->dateEnd],
                ['donhang_chitiet.tinhtrang_id',10],
                ['sanpham.doanhnghiep_id',Auth::user()->doanhnghiep->id]
            ])
            ->whereBetween('donhang.created_at', [ Carbon::parse($request->dateStart)->format('Y-m-d')." 00:00:00", Carbon::parse($request->dateEnd)->format('Y-m-d')." 23:59:59"])
            ->groupBy('donhang_chitiet.dongiaban')
            ->groupBy('sanpham.id')

            ->get();
     
            $session_title_dateStart = $request->dateStart;
            $session_title_dateEnd = $request->dateEnd;
            
            return view('doanhnghiep.donhang.doanhthu',compact('doanhthu','session_title_dateStart','session_title_dateEnd','doanhnghiep'));  
        }
        else
        {
            $tongdoanhthu = DonHang_ChiTiet::join('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
            ->join('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->select('sanpham.*',DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'),'donhang_chitiet.dongiaban as dongiasanpham')
            ->where([
                ['donhang_chitiet.tinhtrang_id',10],
                ['sanpham.doanhnghiep_id',Auth::user()->doanhnghiep->id]
            ])
     
         
           
            ->groupBy('donhang_chitiet.dongiaban')
            ->groupBy('sanpham.id')
        
           
            ->get();
        //dd($tongdoanhthu);
            return view('doanhnghiep.donhang.doanhthu',compact('tongdoanhthu','doanhnghiep'));
        }
        
    }

    public function getDoanhThu_DoanhNghiep (Request $request,$id)
    {    $doanhnghiep = DoanhNghiep::find($id);
      

         if($request->dateStart != '' && $request->dateEnd != '')
        {
            $doanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
            ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->select('sanpham.*',
                      DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban')
                    )
            ->where([
                //['donhang.created_at', '>=', $request->dateStart],
                //['donhang.created_at', '<=', $request->dateEnd],
                ['donhang_chitiet.tinhtrang_id',10],
                ['sanpham.doanhnghiep_id',$id]
            ])
            ->whereBetween('donhang.created_at', [ Carbon::parse($request->dateStart)->format('Y-m-d')." 00:00:00", Carbon::parse($request->dateEnd)->format('Y-m-d')." 23:59:59"])
            ->groupBy('sanpham.id')
            ->get();
     
            $session_title_dateStart = $request->dateStart;
            $session_title_dateEnd = $request->dateEnd;
            
            return view('donviquanly.doanhnghiep.doanhthu',compact('doanhthu','session_title_dateStart','session_title_dateEnd','doanhnghiep'));  
        }
        else
        {
            $tongdoanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
            ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->select('sanpham.*',
                      DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban')
                    )
            ->where([
                
                ['donhang_chitiet.tinhtrang_id',10],
                ['sanpham.doanhnghiep_id',$id]
            ])
          
            ->groupBy('sanpham.id')
        
            ->get();
            return view('donviquanly.doanhnghiep.doanhthu',compact('tongdoanhthu','doanhnghiep'));
        }
        
    }
    public function getDoanhThu_DonViQuanLy ()
    {    
       
       
            
            
               
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
            
                return view('donviquanly.doanhthu.danhsach',compact('tongdoanhthu'));
            
    
        
    }
}
