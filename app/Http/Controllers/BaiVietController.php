<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Models\DoanhNghiep;
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
    public function getDanhSach()
    {
        $baiviet = BaiViet::paginate(10);
        return view('doanhnghiep.baiviet.danhsach',compact('baiviet'));
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
            'tomtat' => ['nullable', 'string', 'max:191'],
            'noidung' => ['required', 'string', 'max:191'],

        ]);

        //thêm
        $orm = new BaiViet();
        $orm->chude_id = $request->chude_id;
        $orm->doanhnghiep_id = Auth::user()->doanhnghiep->id;
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
            'tomtat' => ['nullable', 'string', 'max:191'],
            'noidung' => ['required', 'string', 'max:191'],

        ]);

        // Sửa
        $orm = BaiViet::find($id);
        $orm->chude_id = $request->chude_id;
        $orm->doanhnghiep_id = Auth::user()->doanhnghiep->id;
        $orm->tieude = $request->tieude;
        $orm->tieude_slug = Str::slug($request->tieude,'-');
        $orm->tomtat = $request->tomtat;
        $orm->noidung = $request->noidung;
   
        
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
}
