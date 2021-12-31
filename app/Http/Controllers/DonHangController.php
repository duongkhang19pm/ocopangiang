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
use Illuminate\Support\Facades\Auth;
class DonHangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getDanhSach()
    {

        $donhang = DonHang::orderBy('created_at', 'desc')->get();
        
        $tinhtrang = TinhTrang::all();
        return view('doanhnghiep.donhang.danhsach', compact('donhang','tinhtrang'));
    }
     public function getTinhTrang($id,$tinhtrang_id)
    {
        
        $orm = DonHang::find($id);
        $tinhtrang = TinhTrang::find($tinhtrang_id);
        if($tinhtrang_id == 110)
        {
            $orm->tinhtrang_id =  $tinhtrang_id / 10 - 1;
            $orm->save();
            return redirect()->route('doanhnghiep.donhang');
        }
        else
        {
            $orm->tinhtrang_id =  $tinhtrang_id - 10;
            $orm->save();
            return redirect()->route('doanhnghiep.donhang');
        }
       
    }
      public function getSua($id)
    {
        $donhang = DonHang::find($id);
        if($donhang->tinhtrang_id <= 4)
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
            $tinhtrang = TinhTrang::where('id',$donhang->tinhtrang_id)->first();
             return redirect()->route('doanhnghiep.donhang')->with('status','Đơn Hàng Trong Tình Trạng '.$tinhtrang->tinhtrang.' Không Thể Cập Nhật!');
           
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
        
        if($donhang->tinhtrang_id == 1)
        {
            $chitiet = DonHang_ChiTiet::where('donhang_id', $donhang->id)->delete();
           
            $donhang->delete();
            return redirect()->route('doanhnghiep.donhang');
        }
        else
        {
            $tinhtrang = TinhTrang::where('id',$donhang->tinhtrang_id)->first();
             return redirect()->route('doanhnghiep.donhang')->with('status','Đơn Hàng Trong Tình Trạng '.$tinhtrang->tinhtrang.' Không Thể Xóa!');
        }
        
      
    }
}
