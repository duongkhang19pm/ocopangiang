<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoanhNghiep;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use App\Models\MoHinhKinhDoanh;
use App\Models\LoaiHinhKinhDoanh;
use Str;
use Storage;
use Carbon;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Imports\DoanhNghiepImport;
use App\Exports\DoanhNghiepExport;
use Excel;
class DoanhNghiepController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDanhSach()
    {
        $iddonviquanly = Auth::user()->donviquanly->id;
        $doanhnghiep = DoanhNghiep::where('donviquanly_id', $iddonviquanly)->paginate(10);
        return view('donviquanly.doanhnghiep.danhsach',compact('doanhnghiep'));
    }
    // Nhập từ Excel
     public function postNhap(Request $request)
     {
     Excel::import(new DoanhNghiepImport, $request->file('file_excel'));
     
     return redirect()->route('donviquanly.doanhnghiep');
     }
     
     // Xuất ra Excel
     public function getXuat()
     {
     return Excel::download(new DoanhNghiepExport, 'danh-sach-doanh-nghiep.xlsx');
     }
    public function getThem()
    {
        $tinh = Tinh::all();
        $mohinhkinhdoanh = MoHinhKinhDoanh::all();
        $loaihinhkinhdoanh = LoaiHinhKinhDoanh::all();

        return view('donviquanly.doanhnghiep.them',compact('tinh','loaihinhkinhdoanh','mohinhkinhdoanh'));
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
    public function postThem(Request $request)
    {
        $this->validate($request,[
            'tinh_id' => ['required'],
            'huyen_id'=>['required'],
            'xa_id'=>['required'],
            'tenduong'=>['required','string','max:191'],
            'mohinhkinhdoanh_id'=>['required'],
            'loaihinhkinhdoanh_id'=>['required'],
            'masothue'=>['required','string','max:191'],
            'tendoanhnghiep'=>['required','string','max:191','unique:doanhnghiep'],
            'email'=>['required','email:rfc,dns'],
            'SDT'=>['required','string','min:10','max:12'],
            'website'=>['nullable','url'],
            'ngaythanhlap'=>['nullable','date','before:now'],
            'hinhanh' => ['nullable','image','max:1024'],
           

        ]);
        // up anh
        if($request->hasFile('hinhanh'))
        {
           
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tendoanhnghiep,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('doanhnghiep', $request->file('hinhanh'), $fileName);
        }

        $orm = new DoanhNghiep();
        $orm->donviquanly_id = Auth::user()->donviquanly->id;
       
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->mohinhkinhdoanh_id = $request->mohinhkinhdoanh_id;
        $orm->loaihinhkinhdoanh_id = $request->loaihinhkinhdoanh_id;
        $orm->masothue = $request->masothue;
        $orm->tendoanhnghiep = $request->tendoanhnghiep;
        $orm->tendoanhnghiep_slug = Str::slug($request->tendoanhnghiep,'-');
        $orm->email = $request->email;
        $orm->SDT = $request->SDT;
        $orm->website = $request->website;
        $orm->ngaythanhlap =  $request->ngaythanhlap;
       if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
       $orm->gioithieu = $request->gioithieu;
       $orm->kinhdo = $request->kinhdo;
       $orm->vido = $request->vido;
        $orm->save();

        return redirect()->route('donviquanly.doanhnghiep');
    }
    public function getSua($id)
    {
        $doanhnghiep = DoanhNghiep::find($id);
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        $mohinhkinhdoanh = MoHinhKinhDoanh::all();
        $loaihinhkinhdoanh = LoaiHinhKinhDoanh::all();
        return view('donviquanly.doanhnghiep.sua', compact('doanhnghiep', 'tinh','huyen','xa','mohinhkinhdoanh','loaihinhkinhdoanh'));

    }
    public function postSua(Request $request , $id)
    {
        $this->validate($request,[
            'tinh_id' => ['required'],
            'huyen_id'=>['required'],
            'xa_id'=>['required'],
            'mohinhkinhdoanh_id'=>['required'],
            'loaihinhkinhdoanh_id'=>['required'],
            'masothue'=>['required','string','max:191'],
            'tendoanhnghiep'=>['required','string','max:191','unique:doanhnghiep,tendoanhnghiep,'.$id],
            'email'=>['required','email'],
            'SDT'=>['required','string','min:10','max:12'],
            'website'=>['nullable','url'],
            'ngaythanhlap'=>['nullable','date'],
            'hinhanh' => ['nullable','image','max:1024']

        ]);
       if($request->hasFile('hinhanh'))
       {
        $orm=DoanhNghiep::find($id);
         Storage::delete($orm->hinhanh);


         $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tendoanhnghiep,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
         $path = Storage::putFileAs('doanhnghiep', $request->file('hinhanh'), $fileName);

       }
       $orm=DoanhNghiep::find($id);
        $orm->donviquanly_id = Auth::user()->donviquanly->id;
    
        $orm->xa_id = $request->xa_id;
        $orm->mohinhkinhdoanh_id = $request->mohinhkinhdoanh_id;
        $orm->loaihinhkinhdoanh_id = $request->loaihinhkinhdoanh_id;
        $orm->masothue = $request->masothue;
        $orm->tendoanhnghiep = $request->tendoanhnghiep;
        $orm->tendoanhnghiep_slug = Str::slug($request->tendoanhnghiep,'-');
        $orm->email = $request->email;
        $orm->SDT = $request->SDT;
        $orm->website = $request->website;
        $orm->ngaythanhlap =  $request->ngaythanhlap;
       if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
       $orm->kinhdo = $request->kinhdo;
       $orm->vido = $request->vido;
       $orm->gioithieu = $request->gioithieu;
        $orm->save();

        return redirect()->route('donviquanly.doanhnghiep');
    }
    public function getXoa($id)
    {
        $orm=DoanhNghiep::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
          return redirect()->route('donviquanly.doanhnghiep');
    }
}
