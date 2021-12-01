<?php
namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\DonViQuanLy;
class TaiKhoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDanhSach_Admin()
    {
        $taikhoan = TaiKhoan::all();
        return view('admin.taikhoan_admin.danhsach', compact('taikhoan'));
    }

     public function getDanhSach_DonViQuanLy()
    {
        $taikhoan = TaiKhoan::all();
        $donviquanly = DonViQuanLy::all();
        return view('admin.taikhoan_donviquanly.danhsach', compact('taikhoan','donviquanly'));
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
        return view('admin.taikhoan_admin.sua', ['taikhoan' => $taikhoan]);
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
}
