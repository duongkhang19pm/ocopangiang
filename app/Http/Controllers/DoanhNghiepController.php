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
class DoanhNghiepController extends Controller
{   

     

    public function getDanhSach()
    {
        $doanhnghiep = DoanhNghiep::paginate(10);
        return view('admin.doanhnghiep.danhsach',compact('doanhnghiep'));
    }
    public function getThem()
    {
        $tinh = Tinh::all();
        $mohinhkinhdoanh = MoHinhKinhDoanh::all();
        $loaihinhkinhdoanh = LoaiHinhKinhDoanh::all();

        return view('admin.doanhnghiep.them',compact('tinh','loaihinhkinhdoanh','mohinhkinhdoanh'));
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
            'website'=>['required','url'],
            'ngaythanhlap'=>['nullable','date'],
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
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
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

        return redirect()->route('admin.doanhnghiep');
    }
    public function getSua($id)
    {
        $doanhnghiep = DoanhNghiep::find($id);
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        $mohinhkinhdoanh = MoHinhKinhDoanh::all();
        $loaihinhkinhdoanh = LoaiHinhKinhDoanh::all();
        return view('admin.doanhnghiep.sua', compact('doanhnghiep', 'tinh','huyen','xa','mohinhkinhdoanh','loaihinhkinhdoanh'));

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
            'website'=>['required','url'],
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
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
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
       $orm->gioithieu = $request->gioithieu;
        $orm->save();

        return redirect()->route('admin.doanhnghiep');
    }
    public function getXoa($id)
    {
        $orm=DoanhNghiep::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
          return redirect()->route('admin.doanhnghiep');
    }
}
