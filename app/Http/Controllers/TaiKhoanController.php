<?php
namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\DonViQuanLy;
use App\Models\DoanhNghiep;
use App\Models\ChucVu;
use Illuminate\Support\Facades\Auth;

class TaiKhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Tài Khoản Admin
    public function getDanhSach_Admin()
    {
        $taikhoan = TaiKhoan::where('privilege', 'admin')->get();
        return view('admin.taikhoan_admin.danhsach', compact('taikhoan'));
    }

  

    public function getThem_Admin()
    {
        return view('admin.taikhoan_admin.them');
    }

    public function postThem_Admin(Request $request)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan'],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan'],
        'password' => ['required', 'min:4', 'confirmed'],
        ]);

        $orm = new TaiKhoan();
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        $orm->password = Hash::make($request->password);
        $orm->privilege = 'admin';
        $orm->save();

        return redirect()->route('admin.taikhoan_admin');
    }



    public function getSua_Admin($id)
    {
        $taikhoan = TaiKhoan::find($id);
        return view('admin.taikhoan_admin.sua', compact('taikhoan'));
    }

    public function postSua_Admin(Request $request , $id)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan,username,'.$id],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan,email,'.$id],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan,phone,'.$id],
        'password' => [ 'confirmed'],
        ]);

        $orm = TaiKhoan::find($id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        $orm->save();

        return redirect()->route('admin.taikhoan_admin');
    }

    public function getXoa_Admin($id)
    {
        $orm = TaiKhoan::find($id);
        $orm->delete();

        return redirect()->route('admin.taikhoan_admin');
    }


    //Tài Khoản Đơn Vị Quản Lý
    public function getDanhSach_DonViQuanLy()
    {
        $taikhoan = TaiKhoan::where('privilege', 'donviquanly')->get();
        $donviquanly = DonViQuanLy::all();
        return view('admin.taikhoan_donviquanly.danhsach', compact('taikhoan','donviquanly'));
    }
    
    public function getThem_DonViQuanLy()
    {
         $donviquanly = DonViQuanLy::all();
        return view('admin.taikhoan_donviquanly.them',compact('donviquanly'));
    }

    public function postThem_DonViQuanLy(Request $request)
    {
        $request->validate([
        'donviquanly_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan'],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan'],
        'password' => ['required', 'min:4', 'confirmed'],
        ]);

        $orm = new TaiKhoan();
        $orm->donviquanly_id = $request->donviquanly_id;
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        $orm->password = Hash::make($request->password);
        $orm->privilege = 'donviquanly';
        $orm->save();

        return redirect()->route('admin.taikhoan_donviquanly');
    }
    public function getSua_DonViQuanLy($id)
    {
        $taikhoan = TaiKhoan::find($id);
         $donviquanly = DonViQuanLy::all();
        return view('admin.taikhoan_donviquanly.sua', compact('taikhoan','donviquanly'));
    }

    public function postSua_DonViQuanLy(Request $request , $id)
    {
        $request->validate([
        'donviquanly_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan,username,'.$id],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan,email,'.$id],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan,phone,'.$id],
        'password' => [ 'confirmed'],
        ]);

        $orm = TaiKhoan::find($id);
        $orm->donviquanly_id = $request->donviquanly_id;
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        $orm->save();

        return redirect()->route('admin.taikhoan_donviquanly');
    }

    public function getXoa_DonViQuanLy($id)
    {
        $orm = TaiKhoan::find($id);
        $orm->delete();

        return redirect()->route('admin.taikhoan_donviquanly');
    }


    //Tài Khoản Doanh Nghiệp
    public function getDanhSach_DoanhNghiep()
    {
        $taikhoan = TaiKhoan::where('privilege', 'doanhnghiep')->get();
        $doanhnghiep = DoanhNghiep::all();
        $chucvu = ChucVu::all();
        return view('admin.taikhoan_doanhnghiep.danhsach', compact('taikhoan','doanhnghiep','chucvu'));
    }
    public function getKichHoat_DoanhNghiep($id)
    {
            $taikhoan = TaiKhoan::find($id);
           $taikhoan->kichhoat = 1 - ($taikhoan->kichhoat);
           $taikhoan->save();
        return redirect()->route('admin.taikhoan_doanhnghiep');
    }
    public function getThem_DoanhNghiep()
    {
         $doanhnghiep = DoanhNghiep::all();
          $chucvu = ChucVu::all();
        return view('admin.taikhoan_doanhnghiep.them',compact('doanhnghiep','chucvu'));
    }

    public function postThem_DoanhNghiep(Request $request)
    {
        $request->validate([
        'doanhnghiep_id' => ['required'],
        'chucvu_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan'],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan'],
        'password' => ['required', 'min:4', 'confirmed'],
        ]);

        $orm = new TaiKhoan();
        $orm->doanhnghiep_id = $request->doanhnghiep_id;
        $orm->chucvu_id = $request->chucvu_id;
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        $orm->password = Hash::make($request->password);
        $orm->privilege = 'doanhnghiep';
        $orm->save();

        return redirect()->route('admin.taikhoan_doanhnghiep');
    }
    public function getSua_DoanhNghiep($id)
    {
        $taikhoan = TaiKhoan::find($id);
         $doanhnghiep = DoanhNghiep::all();
          $chucvu = ChucVu::all();
        return view('admin.taikhoan_doanhnghiep.sua', compact('taikhoan','doanhnghiep','chucvu'));
    }

    public function postSua_DoanhNghiep(Request $request , $id)
    {
        $request->validate([
        'doanhnghiep_id' => ['required'],
        'chucvu_id' => ['required'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan,username,'.$id],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan,email,'.$id],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan,phone,'.$id],
        'password' => [ 'confirmed'],
        ]);

        $orm = TaiKhoan::find($id);
        $orm->doanhnghiep_id = $request->doanhnghiep_id;
        $orm->chucvu_id = $request->chucvu_id;
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        $orm->save();

        return redirect()->route('admin.taikhoan_doanhnghiep');
    }

    public function getXoa_DoanhNghiep($id)
    {
        $orm = TaiKhoan::find($id);
        $orm->delete();

        return redirect()->route('admin.taikhoan_doanhnghiep');
    }
}
