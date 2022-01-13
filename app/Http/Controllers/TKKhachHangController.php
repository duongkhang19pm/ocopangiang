<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\DonHang;
use App\Models\TaiKhoan;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use App\Models\DonHang_ChiTiet;
use Storage;
use Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class TKKhachHangController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome ()
    {  

        $taikhoan = TaiKhoan::where('id',Auth::user()->id)->first();
    
       return view('khachhang.index',compact('taikhoan'));
    }
    public function getDonHang($id)
    {
        $taikhoan = TaiKhoan::where('id',$id)->first();
        $donhang = DonHang::where('taikhoan_id',$taikhoan->id)->where('hienthi',1)->orderby('created_at','desc')->paginate(5);
         return view('khachhang.donhang',compact('taikhoan','donhang'));
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


    public function getDonHang_Huy($taikhoan,$id)
     {

         $donhang = DonHang::find($id);
      
         if($donhang->tinhtrang_id < 3)
         {
            $donhang->tinhtrang_id = 3;
            $donhang->save();
          
           


            return redirect()->route('khachhang.donhang',['id'=>$taikhoan]);
         }
         else
         {
             return redirect()->route('khachhang.donhang',['id'=>$taikhoan])->with('status','Đơn hàng trong tình trạng <strong>'.$donhang->tinhtrang->tinhtrang.'</strong> nên không thể hủy <strong>');
         }
       
        
         
    }

    public function getDonHang_HienThi($taikhoan,$id)
    {
        $orm = DonHang::find($id);
        $orm->hienthi = 1 - $orm->hienthi;
        $orm->tinhtrang_id = 3;
        $orm->save();
         return redirect()->route('khachhang.donhang',['id'=>$taikhoan]);

    }
    public function getCapNhatHoSo($id)
    {
        $taikhoan = TaiKhoan::where('id',$id)->first();
        $tinh = Tinh::all();
        $huyen = Huyen::all();
        $xa= Xa::all();
        return view('khachhang.capnhathoso',compact('taikhoan','tinh','huyen','xa'));
    }
    public function postCapNhatHoSo(Request $request , $id)
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
            $path = Storage::putFileAs('taikhoan/taikhoan_khachhang', $request->file('hinhanh'), $fileName);

       }
        $orm = TaiKhoan::find($id);
         $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();
          return redirect()->route('khachhang.home');
    }
    
}
