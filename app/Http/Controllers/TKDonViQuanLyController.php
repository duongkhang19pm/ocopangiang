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

use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;

use DB;
use Carbon\Carbon;
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
            $taikhoan = TaiKhoan::where('donviquanly_id',Auth::user()->donviquanly_id)->where('privilege', 'donviquanly')->get();
            $doanhnghiep = DoanhNghiep::where('donviquanly_id', Auth::user()->donviquanly_id)->get();
            $baiviet = BaiViet::where('taikhoan_id', Auth::user()->id)->get();
            
            $tongdoanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
            ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->leftJoin('doanhnghiep','doanhnghiep.id','=','sanpham.doanhnghiep_id')
            ->select('doanhnghiep.tendoanhnghiep as tendoanhnghiep',
                    
           
                        DB::raw('sum(donhang_chitiet.dongiaban)  AS tongdongiaban'),
                    )
            ->where([
                
                ['donhang_chitiet.tinhtrang_id',10],
               ['doanhnghiep.donviquanly_id',Auth::user()->donviquanly->id]
            ])
          
       
            ->groupBy('doanhnghiep.id')
            
            ->get();
           
            $data = [];

            foreach($tongdoanhthu as $row) {
                
                $data['label'][] = $row->tendoanhnghiep;
                $data['data'][] =  $row->tongdongiaban;
            }
        
            $data['doanhthu1'] = json_encode($data);




            return view('donviquanly.index',$data,compact('taikhoan','doanhnghiep','baiviet'));
        }
         elseif(Auth::user()->kichhoat === 1)
        {
            Auth::logout();
            return redirect()->route('login')->with('warning', 'Tài khoản của bạn đã bị tạm khóa. Vui lòng liên hệ quản trị viên');
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
     public function getHoSoCaNhan($id)
    {
        $taikhoan = TaiKhoan::find($id);
                $baiviet = BaiViet::where('taikhoan_id',$id)->get();
         $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('donviquanly.hosocanhan',compact('taikhoan', 'tinh','huyen','xa','baiviet'));
    }
    public function postHoSoCaNhan(Request $request,$id)
    {
       $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan,username,'.$id],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan,email,'.$id],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan,phone,'.$id],
        'password' => [ 'confirmed'],
        ]);
        if($request->hasFile('hinhanh'))
       {
            $orm=TaiKhoan::find($id);
            Storage::delete($orm->hinhanh);
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->name,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('taikhoan/taikhoan_donviquanly', $request->file('hinhanh'), $fileName);

       }
        $orm = TaiKhoan::where('id', Auth::user()->id)->first();
      
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('donviquanly.hosocanhan',['id'=>$id]);
    }
    public function getBaiVietCaNhan($id)
    {
        $baiviet = BaiViet::where('taikhoan_id',$id)->get();
         $taikhoan = TaiKhoan::find($id);
        return view('donviquanly.baivietcanhan',compact('baiviet','taikhoan'));
    }
    public function getBaiVietChiTiet($id)
    {
        $baiviet = BaiViet::where('id',$id)->first();
         $taikhoan = TaiKhoan::where('id',Auth::user()->id)->first();
        return view('donviquanly.baiviet_chitiet',compact('baiviet','taikhoan'));
    }
}
