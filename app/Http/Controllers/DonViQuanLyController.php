<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonViQuanLy;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use App\Models\MoHinhKinhDoanh;
use App\Models\LoaiHinhKinhDoanh;
use Str;
use Storage;
use Carbon;
use DB;
use App\Imports\DonViQuanLyImport;
use App\Exports\DonViQuanLyExport;
use Excel;

class DonViQuanLyController extends Controller
{
     public function getDanhSach()
    {
        $donviquanly = DonViQuanLy::paginate(10);
        return view('admin.donviquanly.danhsach',compact('donviquanly'));
    }
    // Nhập từ Excel
     public function postNhap(Request $request)
     {
     Excel::import(new DonViQuanLyImport, $request->file('file_excel'));
     
     return redirect()->route('admin.donviquanly');
     }
     
     // Xuất ra Excel
     public function getXuat()
     {
     return Excel::download(new DonViQuanLyExport, 'danh-sach-don-vi-quan-ly.xlsx');
     }
    public function getThem()
    {
        $tinh = Tinh::all();
        return view('admin.donviquanly.them',compact('tinh'));
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
            'tendonviquanly'=>['required','string','max:191','unique:donviquanly'],
            'tenthutruong'=>['required','string','max:191'],
            'email'=>['required','email:rfc,dns'],
            'SDT'=>['required','string','min:10','max:12'],
            'website'=>['nullable','url'],
            'hinhanh' => ['nullable','image','max:1024'],
           

        ]);
        // up anh
        if($request->hasFile('hinhanh'))
        {
           
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tendonviquanly,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('donviquanly', $request->file('hinhanh'), $fileName);
        }

        $orm = new DonViQuanLy();
        
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->tendonviquanly = $request->tendonviquanly;
        $orm->tendonviquanly_slug = Str::slug($request->tendonviquanly,'-');
        $orm->tenthutruong = $request->tenthutruong;
        $orm->email = $request->email;
        $orm->SDT = $request->SDT;
        $orm->website = $request->website;
       if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
       $orm->gioithieu = $request->gioithieu;
    
        $orm->save();

        return redirect()->route('admin.donviquanly');
    }
    public function getSua($id)
    {
        $donviquanly = DonViQuanLy::find($id);
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        $mohinhkinhdoanh = MoHinhKinhDoanh::all();
        $loaihinhkinhdoanh = LoaiHinhKinhDoanh::all();
        return view('admin.donviquanly.sua', compact('donviquanly', 'tinh','huyen','xa','mohinhkinhdoanh','loaihinhkinhdoanh'));

    }
    public function postSua(Request $request , $id)
    {
        $this->validate($request,[
            'tinh_id' => ['required'],
            'huyen_id'=>['required'],
            'xa_id'=>['required'],
            'tenduong'=>['required','string','max:191'],
            'tendonviquanly'=>['required','string','max:191','unique:donviquanly,tendonviquanly,'.$id],
            'tenthutruong'=>['required','string','max:191'],
            'email'=>['required','email:rfc,dns'],
            'SDT'=>['required','string','min:10','max:12'],
            'website'=>['nullable','url'],
            'hinhanh' => ['nullable','image','max:1024'],

        ]);
       if($request->hasFile('hinhanh'))
       {
        $orm=DonViQuanLy::find($id);
         Storage::delete($orm->hinhanh);


         $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tendonviquanly,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
         $path = Storage::putFileAs('donviquanly', $request->file('hinhanh'), $fileName);

       }
       $orm=DonViQuanLy::find($id);
       
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->tendonviquanly = $request->tendonviquanly;
        $orm->tendonviquanly_slug = Str::slug($request->tendonviquanly,'-');
        $orm->tenthutruong = $request->tenthutruong;
        $orm->email = $request->email;
        $orm->SDT = $request->SDT;
        $orm->website = $request->website;
       if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
       $orm->gioithieu = $request->gioithieu;
        $orm->save();

        return redirect()->route('admin.donviquanly');
    }
    public function getXoa($id)
    {
        $orm=DonViQuanLy::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
          return redirect()->route('admin.donviquanly');
    }
}
