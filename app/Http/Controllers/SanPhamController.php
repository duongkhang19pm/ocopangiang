<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\NhomSanPham;
use App\Models\LoaiSanPham;
use App\Models\DoanhNghiep;
use App\Models\PhanHang;
use App\Models\DonViTinh;
use App\Models\QuyCach;
use App\Models\HinhAnh;
use Str;
use File;
use Storage;
use Illuminate\Support\Facades\Auth;
use App\Imports\SanPhamImport;
use App\Exports\SanPhamExport;
use Excel;
use App\Models\ChiTiet_PhanHang_SanPham;
use Illuminate\Support\Facades\DB;
class SanPhamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Nhập từ Excel
     public function postNhap(Request $request)
     {
     Excel::import(new SanPhamImport, $request->file('file_excel'));
     
     return redirect()->route('doanhnghiep.sanpham');
     }
     
     // Xuất ra Excel
     public function getXuat()
     {

        return Excel::download(new SanPhamExport, 'danh-sach-san-pham.xlsx');
     }
    public function getDanhSach()
    {
        
        $iddoanhnghiep = Auth::user()->doanhnghiep->id;
        $sanpham = SanPham::where('doanhnghiep_id', $iddoanhnghiep)->paginate(10);
        
        return view('doanhnghiep.sanpham.danhsach',compact('sanpham'));
    }
    public function getThem()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        $hinhanh_identity = DB::select("SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '" . config('database.connections.mysql.database') . "' AND TABLE_NAME = 'sanpham'");
        $next_id = $hinhanh_identity[0]->AUTO_INCREMENT;
        Storage::makeDirectory('sanpham/' . str_pad($next_id, 7, '0', STR_PAD_LEFT), 0775);
        $path = config('app.url') . '/storage/app/sanpham/' . str_pad($next_id, 7, '0', STR_PAD_LEFT) . '/';
        if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
        $_SESSION['baseUrl'] = $path;
        if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
        $_SESSION['resourceType'] = 'Images';
        
        $folder = 'sanpham/' . str_pad($next_id, 7, '0', STR_PAD_LEFT);


        $nhomsanpham =NhomSanPham::all();
        $donvitinh =DonViTinh::all();
       $phanhang =PhanHang::all();
        $doanhnghiep =DoanhNghiep::all();
        return view('doanhnghiep.sanpham.them',compact('nhomsanpham','donvitinh','doanhnghiep','phanhang','folder'));
    }
     public function getLoai(Request $request)
    {
        $loai = LoaiSanPham::where("nhomsanpham_id", $request->nhomsanpham_id)->pluck("tenloai", "id");
        return response()->json($loai);
    }
     public function getQuyCach(Request $request)
    {
        $quycach = QuyCach::where("donvitinh_id", $request->donvitinh_id)->pluck("tenquycach", "id");
        return response()->json($quycach);
    }
    public function postThem(Request $request)
    {
        $this->validate($request,[
           
            'loaisanpham_id'=>['required'],
           
            'quycach_id'=>['required'],
            
            
            'tensanpham'=>['required','string','max:191','unique:sanpham'],
            'nguyenlieu'=>['nullable','string','max:191'],
            'tieuchuan'=>['nullable','string','max:191'],
            'dieukienvanchuyen'=>['nullable','string','max:191'],
            'dieukienluutru'=>['nullable','string','max:191'],
            'khoiluongrieng'=>['required','string','max:191'],
            'soluong'=>['required','numeric'],
            'dongia'=>['required','numeric'],
            'hansudung'=>['nullable','string','max:191'],
            'hansudungsaumohop'=>['nullable','string','max:191'],
            
            'phanhang_id'=>['required'],
            'ngaybatdau'=>['required','date'],
            'ngayketthuc'=>['nullable','date','after:ngaybatdau'],
            'hinhanh' => ['nullable','image','max:1024'],
            'thumuc' => ['nullable'],

        ]);
        
        // up anh
        if($request->hasFile('hinhanh'))
        {
           
        // Tạo thư mục nếu chưa có
             $doanhnghiep = Auth::user()->doanhnghiep;
             File::isDirectory($doanhnghiep->tendoanhnghiep_slug) or Storage::makeDirectory($doanhnghiep->tendoanhnghiep_slug, 0775);
         
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tensanpham,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs($doanhnghiep->tendoanhnghiep_slug, $request->file('hinhanh'), $fileName);
        }
        
        $orm = new SanPham();
       // $orm->nhomsanpham_id = $request->nhomsanpham_id;
        $orm->loaisanpham_id = $request->loaisanpham_id;
        //$orm->donvitinh_id = $request->donvitinh_id;
        $orm->quycach_id = $request->quycach_id;
        $orm->doanhnghiep_id = Auth::user()->doanhnghiep->id;
       // $orm->phanhang_id = $request->phanhang_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->nguyenlieu = $request->nguyenlieu;
        $orm->tieuchuan = $request->tieuchuan;
        $orm->dieukienvanchuyen = $request->dieukienvanchuyen;
        $orm->dieukienluutru = $request->dieukienluutru;
        $orm->khoiluongrieng = $request->khoiluongrieng;
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hansudung = $request->hansudung;
        $orm->hansudungsaumohop = $request->hansudungsaumohop;
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->thumuc = $request->thumuc;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();


        $ct = new ChiTiet_PhanHang_SanPham();
        $ct->phanhang_id = $request->phanhang_id;
        $ct->sanpham_id = $orm->id;
        $ct->ngaybatdau = $request->ngaybatdau;
        $ct->ngayketthuc = $request->ngayketthuc;
        $ct->save();

      
     


        return redirect()->route('doanhnghiep.sanpham');

    }
    public function getSua($id)
    {

        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        
        $path = config('app.url') . '/storage/app/sanpham/' . str_pad($id, 7, '0', STR_PAD_LEFT) . '/';
        if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
        $_SESSION['baseUrl'] = $path;
        if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
        $_SESSION['resourceType'] = 'Images';
        
        $folder = 'sanpham/' . str_pad($id, 7, '0', STR_PAD_LEFT);

        $sanpham = SanPham::find($id);
        $nhomsanpham=NhomSanPham::all();
        $loai= LoaiSanPham::where('id',$sanpham->loaisanpham_id);
        $donvitinh=DonViTinh::all();
        $quycach=QuyCach::all();
        $loaisanpham=LoaiSanPham::all();
        $doanhnghiep =DoanhNghiep::all();
        $ct = ChiTiet_PhanHang_SanPham::where('sanpham_id',$sanpham->id)->first();
      $phanhang =PhanHang::all();
        return view('doanhnghiep.sanpham.sua',compact('sanpham','nhomsanpham','loaisanpham','donvitinh','quycach','ct','phanhang','doanhnghiep','folder'));
    }
    public function postSua(Request $request , $id)
    {
        $this->validate($request,[
           
            'loaisanpham_id'=>['required'],
            
              'quycach_id'=>['required'],
            'phanhang_id'=>['required'],
            
            'tensanpham'=>['required','string','max:191','unique:sanpham,tensanpham,'.$id],
           'nguyenlieu'=>['nullable','string','max:191'],
            'tieuchuan'=>['nullable','string','max:191'],
            'dieukienvanchuyen'=>['nullable','string','max:191'],
            'dieukienluutru'=>['nullable','string','max:191'],
            'khoiluongrieng'=>['required','string','max:191'],
            'soluong'=>['required','numeric'],
            'dongia'=>['required','numeric'],
            'hansudung'=>['nullable','string','max:191'],
            'hansudungsaumohop'=>['nullable','string','max:191'],
            'hinhanh' => ['nullable','image','max:1024'],
            'phanhang_id'=>['required'],
            'ngaybatdau'=>['required','date'],
            'ngayketthuc'=>['nullable','date'],

        ]);
        
         if($request->hasFile('hinhanh'))
        {
           $orm = SanPham::find($id);
            Storage::delete($orm->hinhanh);
         // Tạo thư mục nếu chưa có
         $doanhnghiep = Auth::user()->doanhnghiep;
         File::isDirectory($doanhnghiep->tendoanhnghiep_slug) or Storage::makeDirectory($doanhnghiep->tendoanhnghiep_slug, 0775);


            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->tensanpham,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
         $path = Storage::putFileAs($doanhnghiep->tendoanhnghiep_slug, $request->file('hinhanh'), $fileName);
        }
        
        $orm = SanPham::find($id);
        
        $orm->loaisanpham_id = $request->loaisanpham_id;
       
        $orm->quycach_id = $request->quycach_id;
        $orm->doanhnghiep_id = Auth::user()->doanhnghiep->id;
       
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->nguyenlieu = $request->nguyenlieu;
        $orm->tieuchuan = $request->tieuchuan;
        $orm->dieukienvanchuyen = $request->dieukienvanchuyen;
        $orm->dieukienluutru = $request->dieukienluutru;
        $orm->khoiluongrieng = $request->khoiluongrieng;
        $orm->soluong = $request->soluong;
        $orm->dongia = $request->dongia;
        $orm->hansudung = $request->hansudung;
        $orm->hansudungsaumohop = $request->hansudungsaumohop;
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->thumuc = $request->thumuc;
        $orm->motasanpham = $request->motasanpham;
        $orm->save();

            $ct = ChiTiet_PhanHang_SanPham::where('sanpham_id',$orm->id)->delete();
            $ct = new ChiTiet_PhanHang_SanPham();
            $ct->phanhang_id = $request->phanhang_id;
            $ct->sanpham_id = $orm->id;
            $ct->ngaybatdau = $request->ngaybatdau;
            $ct->ngayketthuc = $request->ngayketthuc;
            $ct->save();
      


        return redirect()->route('doanhnghiep.sanpham');

    }
    public function getXoa($id)
    {
        $orm=SanPham::find($id);
       
        
        $ct = ChiTiet_PhanHang_SanPham::where('sanpham_id',$orm->id)->first();
        if(!empty($ct))
        {
            $ct->delete();
        }
        Storage::deleteDirectory('sanpham/' . str_pad($orm->id, 7, '0', STR_PAD_LEFT));
       
        $orm->delete();
        Storage::delete($orm->hinhanh);
        return redirect()->route('doanhnghiep.sanpham');
    }
    public function getHienThi($id)
    {
        $orm = SanPham::find($id);
        $orm->hienthi = 1 - $orm->hienthi;
        
        $orm->save();
        return redirect()->route('doanhnghiep.sanpham');

    }
    public function getDanhGia($id)
    {
        $orm = SanPham::find($id);
        $orm->danhgia = 1 - $orm->danhgia;
        
        $orm->save();
        return redirect()->route('doanhnghiep.sanpham');

    }
    public function postHinhAnh(Request $request)
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        $path = config('app.url') . '/storage/app/sanpham/' . str_pad($request->id, 7, '0', STR_PAD_LEFT) . '/';
        if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
        $_SESSION['baseUrl'] = $path;
        if(isset($_SESSION['resourceType'])) unset($_SESSION['resourceType']);
        $_SESSION['resourceType'] = 'Images';
        
        return 1;
    }
}
