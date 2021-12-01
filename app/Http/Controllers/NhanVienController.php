<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use App\Models\NhanVien;
use App\Models\DoanhNghiep;
use App\Models\ChucVu;
use Str;
use Storage;
use Carbon;
use DB;
use File;
class NhanVienController extends Controller
{
    public function getDanhSach()
    {
        $nhanvien = NhanVien::paginate(10);
        return view('admin.nhanvien.danhsach',compact('nhanvien'));
    }
    public function getThem()
    {
        $tinh = Tinh::all();
        $doanhnghiep = DoanhNghiep::all();
        $chucvu = ChucVu::all();

        return view('admin.nhanvien.them',compact('tinh','doanhnghiep','chucvu'));
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
            'doanhnghiep_id'=>['required'],
            'chucvu_id'=>['required'],
            'tennhanvien'=>['required','string','max:191'],
            'email'=>['required','email:rfc,dns','unique:nhanvien'],
            'SDT'=>['required','string','min:10','max:12','unique:nhanvien'],
            'CMND'=>['required','string','min:9','max:12','unique:nhanvien'],
            'ngaysinh'=>['nullable','date','before:now'],
            'gioitinh'=>['required'],
            'hinhanh' => ['nullable','image','max:1024'],
           

        ]);
        // up anh
        if($request->hasFile('hinhanh'))
        {
            // Tạo thư mục nếu chưa có
             $doanhnghiep = DoanhNghiep::find($request->doanhnghiep_id);
             File::isDirectory($doanhnghiep->tendoanhnghiep_slug) or Storage::makeDirectory($doanhnghiep->tendoanhnghiep_slug, 0775);
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tennhanvien,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs($doanhnghiep->tendoanhnghiep_slug, $request->file('hinhanh'), $fileName);
        }

        $orm = new NhanVien();
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->doanhnghiep_id = $request->doanhnghiep_id;
        $orm->chucvu_id = $request->chucvu_id;
        $orm->tennhanvien = $request->tennhanvien;
        $orm->email = $request->email;
        $orm->SDT = $request->SDT;
        $orm->CMND = $request->CMND;
        $orm->gioitinh = $request->gioitinh;
        $orm->ngaysinh =  $request->ngaysinh;
       if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('admin.nhanvien');
    }
    public function getSua($id)
    {
        $nhanvien = NhanVien::find($id);
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        $doanhnghiep = DoanhNghiep::all();
        $chucvu = ChucVu::all();
        return view('admin.nhanvien.sua', compact('nhanvien', 'tinh','huyen','xa','doanhnghiep','chucvu'));

    }
    public function postSua(Request $request , $id)
    {
        $this->validate($request,[
           'tinh_id' => ['required'],
            'huyen_id'=>['required'],
            'xa_id'=>['required'],
            'tenduong'=>['required','string','max:191'],
            'doanhnghiep_id'=>['required'],
            'chucvu_id'=>['required'],
            'tennhanvien'=>['required','string','max:191'],
            'email'=>['required','email:rfc,dns','unique:nhanvien,email,'.$id],
            'SDT'=>['required','string','min:10','max:12','unique:nhanvien,SDT,'.$id],
            'CMND'=>['required','string','min:9','max:12','unique:nhanvien,CMND,'.$id],
            'ngaysinh'=>['nullable','date','before:now'],
            'gioitinh'=>['required'],
            'hinhanh' => ['nullable','image','max:1024'],

        ]);
       if($request->hasFile('hinhanh'))
       {
             $orm=NhanVien::find($id);
             Storage::delete($orm->hinhanh);


             // Tạo thư mục nếu chưa có
             $doanhnghiep = DoanhNghiep::find($request->doanhnghiep_id);
             File::isDirectory($doanhnghiep->tendoanhnghiep_slug) or Storage::makeDirectory($doanhnghiep->tendoanhnghiep_slug, 0775);
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tennhanvien,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs($doanhnghiep->tendoanhnghiep_slug, $request->file('hinhanh'), $fileName);

       }
       $orm=NhanVien::find($id);
        $orm->tinh_id = $request->tinh_id;
        $orm->huyen_id = $request->huyen_id;
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->doanhnghiep_id = $request->doanhnghiep_id;
        $orm->chucvu_id = $request->chucvu_id;
        $orm->tennhanvien = $request->tennhanvien;
        $orm->email = $request->email;
        $orm->SDT = $request->SDT;
        $orm->CMND = $request->CMND;
        $orm->gioitinh = $request->gioitinh;
        $orm->ngaysinh =  $request->ngaysinh;
       if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('admin.nhanvien');
    }
    public function getXoa($id)
    {
        $orm=NhanVien::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
          return redirect()->route('admin.nhanvien');
    }
}
