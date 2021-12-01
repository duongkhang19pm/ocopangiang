<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\NhomSanPham;
use App\Models\LoaiSanPham;
use App\Models\DoanhNghiep;
use App\Models\PhanHang;
use Str;
use File;
use Storage;
class SanPhamController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = SanPham::paginate(20);
        return view('admin.sanpham.danhsach',compact('sanpham'));
    }
    public function getThem()
    {
        $nhomsanpham =NhomSanPham::all();
       $phanhang =PhanHang::all();
        $doanhnghiep =DoanhNghiep::all();
        return view('admin.sanpham.them',compact('nhomsanpham','doanhnghiep','phanhang'));
    }
     public function getLoai(Request $request)
    {
        $loai = LoaiSanPham::where("nhomsanpham_id", $request->nhomsanpham_id)->pluck("tenloai", "id");
        return response()->json($loai);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'nhomsanpham_id' => ['required'],
            'loaisanpham_id'=>['required'],
            'doanhnghiep_id'=>['required'],
            'phanhang_id'=>['required'],
            
            'tensanpham'=>['required','string','max:191','unique:sanpham'],
            'nguyenlieu'=>['required','string','max:191'],
            'soluong'=>['required','numeric'],
            'dongia'=>['required','numeric'],
            'hansudung'=>['nullable','string','max:191'],
            'hansudungsaumohop'=>['nullable','string','max:191'],
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

        $orm = new SanPham();
        $orm->nhomsanpham_id = $request->nhomsanpham_id;
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->doanhnghiep_id = $request->doanhnghiep_id;
        $orm->phanhang_id = $request->phanhang_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->nguyenlieu = $request->nguyenlieu;
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hansudung = $request->hansudung;
        $orm->hansudungsaumohop = $request->hansudungsaumohop;
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();
        return redirect()->route('admin.sanpham');

    }
    public function getSua($id)
    {
        $sanpham = SanPham::find($id);
        $nhomsanpham=NhomSanPham::all();
        $loaisanpham=LoaiSanPham::all();
        $doanhnghiep =DoanhNghiep::all();
         $phanhang =PhanHang::all();
        return view('admin.sanpham.sua',compact('sanpham','nhomsanpham','loaisanpham','phanhang','doanhnghiep'));
    }
    public function postSua(Request $request , $id)
    {
        $this->validate($request,[
             'nhomsanpham_id' => ['required'],
            'loaisanpham_id'=>['required'],
            'doanhnghiep_id'=>['required'],
            'phanhang_id'=>['required'],
            
            'tensanpham'=>['required','string','max:191','unique:sanpham,tensanpham,'.$id],
            'nguyenlieu'=>['required','string','max:191'],
            'soluong'=>['required','numeric'],
            'dongia'=>['required','numeric'],
            'hansudung'=>['nullable','string','max:191'],
            'hansudungsaumohop'=>['nullable','string','max:191'],
            'hinhanh' => ['nullable','image','max:1024'],
        ]);
         if($request->hasFile('hinhanh'))
        {
           $orm = SanPham::find($id);
            Storage::delete($orm->hinhanh);
         // Tạo thư mục nếu chưa có
         $doanhnghiep = DoanhNghiep::find($request->doanhnghiep_id);
         File::isDirectory($doanhnghiep->tendoanhnghiep_slug) or Storage::makeDirectory($doanhnghiep->tendoanhnghiep_slug, 0775);


            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tensanpham,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
         $path = Storage::putFileAs($doanhnghiep->tendoanhnghiep_slug, $request->file('hinhanh'), $fileName);
        }
        $orm = SanPham::find($id);
         $orm->nhomsanpham_id = $request->nhomsanpham_id;
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->doanhnghiep_id = $request->doanhnghiep_id;
        $orm->phanhang_id = $request->phanhang_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->nguyenlieu = $request->nguyenlieu;
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hansudung = $request->hansudung;
        $orm->hansudungsaumohop = $request->hansudungsaumohop;
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();
        return redirect()->route('admin.sanpham');

    }
    public function getXoa($id)
    {
        $orm=SanPham::find($id);
        $orm->delete();
        Storage::delete($orm->hinhanh);
          return redirect()->route('admin.sanpham');
    }
}
