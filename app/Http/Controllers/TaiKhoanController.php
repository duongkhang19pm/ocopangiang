<?php
namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\DonViQuanLy;
use App\Models\DoanhNghiep;
use App\Models\ChucVu;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use Illuminate\Support\Facades\Auth;
use Storage;
use Illuminate\Support\Arr;
class TaiKhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    //Tài Khoản Admin
    public function getDanhSach_Admin()
    {
        $taikhoan = TaiKhoan::where('privilege', 'admin')->get();
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('admin.taikhoan_admin.danhsach', compact('taikhoan', 'tinh','huyen','xa'));
    }

  

    public function getThem_Admin()
    {
        $tinh = Tinh::all();
        return view('admin.taikhoan_admin.them',compact('tinh'));
    }

    public function postThem_Admin(Request $request)
    {
        $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan'],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan'],
        'password' => ['required', 'min:4', 'confirmed'],
        'hinhanh' => ['nullable','image','max:1024'],
        ]);
        // up anh
        if($request->hasFile('hinhanh'))
        {
           
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->name,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('taikhoan/taikhoan_admin', $request->file('hinhanh'), $fileName);
        }
        $orm = new TaiKhoan();
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        $orm->password = Hash::make($request->password);
        $orm->privilege = 'admin';
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('admin.taikhoan_admin');
    }



    public function getSua_Admin($id)
    {
        $taikhoan = TaiKhoan::find($id);
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('admin.taikhoan_admin.sua', compact('taikhoan', 'tinh','huyen','xa'));
    }

    public function postSua_Admin(Request $request , $id)
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
            $path = Storage::putFileAs('taikhoan/taikhoan_admin', $request->file('hinhanh'), $fileName);

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

        return redirect()->route('admin.taikhoan_admin');
    }

    public function getXoa_Admin($id)
    {
        $orm = TaiKhoan::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
        return redirect()->route('admin.taikhoan_admin');
    }


    //Tài Khoản Khách Hàng
    public function getDanhSach_KhachHang()
    {
        $taikhoan = TaiKhoan::where('privilege', 'user')->get();
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('admin.taikhoan_khachhang.danhsach', compact('taikhoan', 'tinh','huyen','xa'));
    }

  

    public function getThem_KhachHang()
    {
        $tinh = Tinh::all();
        return view('admin.taikhoan_khachhang.them',compact('tinh'));
    }

    public function postThem_KhachHang(Request $request)
    {
        $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan'],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan'],
        'password' => ['required', 'min:4', 'confirmed'],
        'hinhanh' => ['nullable','image','max:1024'],
        ]);
        // up anh
        if($request->hasFile('hinhanh'))
        {
           
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->name,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('taikhoan/taikhoan_khachhang', $request->file('hinhanh'), $fileName);
        }
        $orm = new TaiKhoan();
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        $orm->password = Hash::make($request->password);
        $orm->privilege = 'user';
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('admin.taikhoan_khachhang');
    }



    public function getSua_KhachHang($id)
    {
        $taikhoan = TaiKhoan::find($id);
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('admin.taikhoan_khachhang.sua', compact('taikhoan', 'tinh','huyen','xa'));
    }

    public function postSua_KhachHang(Request $request , $id)
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

        return redirect()->route('admin.taikhoan_khachhang');
    }

    public function getXoa_KhachHang($id)
    {
        $orm = TaiKhoan::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
        return redirect()->route('admin.taikhoan_khachhang');
    }


    //Tài Khoản Đơn Vị Quản Lý
    public function getDanhSach_DonViQuanLy()
    {
        $taikhoan = TaiKhoan::where('privilege', 'donviquanly')->get();
        $donviquanly = DonViQuanLy::all();
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('admin.taikhoan_donviquanly.danhsach', compact('taikhoan','donviquanly', 'tinh','huyen','xa'));
    }
    
    public function getThem_DonViQuanLy()
    {
         $donviquanly = DonViQuanLy::all();
         $tinh = Tinh::all();
        return view('admin.taikhoan_donviquanly.them',compact('donviquanly','tinh'));
    }

    public function postThem_DonViQuanLy(Request $request)
    {
        $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'donviquanly_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan'],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan'],
        'password' => ['required', 'min:4', 'confirmed'],
        'hinhanh' => ['nullable','image','max:1024'],
        ]);

        // up anh
        if($request->hasFile('hinhanh'))
        {
           
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->name,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('taikhoan/taikhoan_donviquanly', $request->file('hinhanh'), $fileName);
        }
        $orm = new TaiKhoan();
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->donviquanly_id = $request->donviquanly_id;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        $orm->password = Hash::make($request->password);
        $orm->privilege = 'donviquanly';
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('admin.taikhoan_donviquanly');
    }
    public function getSua_DonViQuanLy($id)
    {
        $taikhoan = TaiKhoan::find($id);
         $donviquanly = DonViQuanLy::all();
         $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('admin.taikhoan_donviquanly.sua', compact('taikhoan','donviquanly', 'tinh','huyen','xa'));
    }

    public function postSua_DonViQuanLy(Request $request , $id)
    {
        $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'donviquanly_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan,username,'.$id],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan,email,'.$id],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan,phone,'.$id],
        'password' => [ 'confirmed'],
        'hinhanh' => ['nullable','image','max:1024'],
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
        $orm = TaiKhoan::find($id);
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->donviquanly_id = $request->donviquanly_id;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('admin.taikhoan_donviquanly');
    }

    public function getXoa_DonViQuanLy($id)
    {
        $orm = TaiKhoan::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
        return redirect()->route('admin.taikhoan_donviquanly');
    }


    //Tài Khoản Doanh Nghiệp
    public function getDanhSach_DoanhNghiep()
    {

        $taikhoan = TaiKhoan::where('donviquanly_id',Auth::user()->donviquanly_id)->where('privilege', 'doanhnghiep')->get();

$doanhnghiep = DoanhNghiep::all();
        $chucvu = ChucVu::all();
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('donviquanly.taikhoan_doanhnghiep.danhsach', compact('taikhoan','doanhnghiep','chucvu', 'tinh','huyen','xa'));
    }
    public function getKichHoat_DoanhNghiep($id)
    {
            $taikhoan = TaiKhoan::find($id);
           $taikhoan->kichhoat = 1 - ($taikhoan->kichhoat);
           $taikhoan->save();
        return redirect()->route('donviquanly.taikhoan_doanhnghiep');
    }
    public function getThem_DoanhNghiep()
    {
        $taikhoan = TaiKhoan::where('donviquanly_id',Auth::user()->donviquanly_id)->where('privilege', 'doanhnghiep')->get();
        $chucvu = ChucVu::all();
        $tinh = Tinh::all();
        $doanhnghiep_id = Arr::pluck($taikhoan, 'doanhnghiep_id');
        $doanhnghiep = DoanhNghiep::where('donviquanly_id', Auth::user()->donviquanly_id)
            ->whereNotIn('doanhnghiep_id', $doanhnghiep_id)->get();
        return view('donviquanly.taikhoan_doanhnghiep.them',compact('doanhnghiep','chucvu','tinh'));
    }

    public function postThem_DoanhNghiep(Request $request)
    {
        $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'chucvu_id' => ['required'],
        'doanhnghiep_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan'],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan'],
        'password' => ['required', 'min:4', 'confirmed'],
        'hinhanh' => ['nullable','image','max:1024'],
        ]);
         // up anh
        if($request->hasFile('hinhanh'))
        {
           
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->name,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('taikhoan/taikhoan_doanhnghiep', $request->file('hinhanh'), $fileName);
        }
        
        $orm = new TaiKhoan();
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->doanhnghiep_id = $request->doanhnghiep_id;
        $orm->donviquanly_id = Auth::user()->donviquanly_id;
        $orm->chucvu_id = $request->chucvu_id;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        $orm->password = Hash::make($request->password);
        $orm->privilege = 'doanhnghiep';
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('donviquanly.taikhoan_doanhnghiep');
    }
    public function getSua_DoanhNghiep($id)
    {
        $taikhoan = TaiKhoan::find($id);
          $chucvu = ChucVu::all();
          $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('donviquanly.taikhoan_doanhnghiep.sua', compact('taikhoan','chucvu', 'tinh','huyen','xa'));
    }

    public function postSua_DoanhNghiep(Request $request , $id)
    {
        $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'chucvu_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan,username,'.$id],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan,email,'.$id],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan,phone,'.$id],
        'password' => [ 'confirmed'],
        'hinhanh' => ['nullable','image','max:1024'],
        ]);
         if($request->hasFile('hinhanh'))
       {
            $orm=TaiKhoan::find($id);
            Storage::delete($orm->hinhanh);
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->name,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('taikhoan/taikhoan_doanhnghiep', $request->file('hinhanh'), $fileName);

       }
        $orm = TaiKhoan::find($id);
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->doanhnghiep_id =  Auth::user()->doanhnghiep->id;
        $orm->chucvu_id = $request->chucvu_id;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('donviquanly.taikhoan_doanhnghiep');
    }

    public function getXoa_DoanhNghiep($id)
    {
        $orm = TaiKhoan::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
        return redirect()->route('donviquanly.taikhoan_doanhnghiep');
    }
}
