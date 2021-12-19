<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\TaiKhoan;
use App\Models\ChuDe;
use Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class BaiVietController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    // Bài viết của doanh nghiệp 
    public function getDanhSach()
    {
        $baiviet = BaiViet::where('taikhoan_id', Auth::user()->id)->get();
        $taikhoan=TaiKhoan::where('privilege', 'doanhnghiep')->get();
        return view('doanhnghiep.baiviet.danhsach',compact('baiviet','taikhoan'));
    }
    public function getThem()
        
    {
        $chude = ChuDe::all();
        return view('doanhnghiep.baiviet.them',compact('chude'));
    }
    public function postThem(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
            'chude_id' => ['required'],
            'tieude' => ['required', 'string', 'max:191','unique:baiviet'],
            'tomtat' => ['nullable', 'string'],
            'noidung' => ['required', 'string'],

        ]);

        //thêm
        $orm = new BaiViet();
        $orm->chude_id = $request->chude_id;
        $orm->taikhoan_id = Auth::user()->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude,'-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;
        $orm->ngaydang = Carbon::now();
        $orm->luotxem = 0;
        $orm->save();

         //quay về danh sách
        return redirect()->route('doanhnghiep.baiviet');
    }
    public function getSua($id)
    {
        $baiviet = BaiViet::find($id);
        $chude = ChuDe::all();
        return view('doanhnghiep.baiviet.sua',compact('baiviet','chude'));
    }
    public function postSua(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'chude_id' => ['required'],
            'tieude' => ['required', 'string', 'max:191','unique:baiviet,tieude,'.$id],
            'tomtat' => ['nullable', 'string'],
            'noidung' => ['required'],

        ]);

        // Sửa
        $orm = BaiViet::find($id);
       $orm->chude_id = $request->chude_id;
        $orm->taikhoan_id = Auth::user()->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;
        
        $orm->ngaydang = Carbon::now();
 
        $orm->save();
        //quay về danh sách
        return redirect()->route('doanhnghiep.baiviet');



    }
    public function getXoa($id)
    {
        $orm = BaiViet::find($id);
        $orm->delete();
        return redirect()->route('doanhnghiep.baiviet'); 
    }

     public function getKiemDuyet($id)
    {
            $baiviet = BaiViet::find($id);
           $baiviet->kiemduyet = 1 - ($baiviet->kiemduyet);
           $baiviet->save();
        return redirect()->route('doanhnghiep.baiviet');
    }


    // Bài viết của đơn vị quản lý 
    public function getDanhSach_DonViQuanLy()
    {
        
        $baiviet = BaiViet::where('taikhoan_id', Auth::user()->id)->get();
        $taikhoan=TaiKhoan::where('privilege', 'donviquanly')->get();
        return view('donviquanly.baiviet.danhsach',compact('baiviet','taikhoan'));
    }
    public function getThem_DonViQuanLy()
        
    {
        $chude = ChuDe::all();
        return view('donviquanly.baiviet.them',compact('chude'));
    }
    public function postThem_DonViQuanLy(Request $request)
    {
        //kiểm tra 

        $this->validate($request, [
            'chude_id' => ['required'],
            'tieude' => ['required', 'string', 'max:191','unique:baiviet'],
            'tomtat' => ['nullable', 'string'],
            'noidung' => ['required', 'string'],

        ]);

        //thêm
        $orm = new BaiViet();
        $orm->chude_id = $request->chude_id;
        $orm->taikhoan_id = Auth::user()->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude,'-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;
        $orm->ngaydang = Carbon::now();
        $orm->luotxem = 0;
        $orm->save();

         //quay về danh sách
        return redirect()->route('donviquanly.baiviet');
    }
    public function getSua_DonViQuanLy($id)
    {
        $baiviet = BaiViet::find($id);
        $chude = ChuDe::all();
        return view('donviquanly.baiviet.sua',compact('baiviet','chude'));
    }
    public function postSua_DonViQuanLy(Request $request , $id)
    {
        //kiểm tra 

        $this->validate($request, [
            'chude_id' => ['required'],
            'tieude' => ['required', 'string', 'max:191','unique:baiviet,tieude,'.$id],
            'tomtat' => ['nullable', 'string'],
            'noidung' => ['required'],

        ]);

        // Sửa
        $orm = BaiViet::find($id);
        $orm->chude_id = $request->chude_id;
        $orm->taikhoan_id = Auth::user()->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude, '-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;
        
        $orm->ngaydang = Carbon::now();
 
        $orm->save();
        //quay về danh sách
        return redirect()->route('donviquanly.baiviet');
    }
    public function getXoa_DonViQuanLy($id)
    {
        $orm = BaiViet::find($id);
        $orm->delete();
        return redirect()->route('donviquanly.baiviet'); 
    }

     public function getKiemDuyet_DonViQuanLy($id)
    {
            $baiviet = BaiViet::find($id);
           $baiviet->kiemduyet = 1 - ($baiviet->kiemduyet);
           $baiviet->save();
        return redirect()->route('donviquanly.baiviet');
    }
}
