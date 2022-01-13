<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;
use App\Models\PhanHang;
use App\Models\HinhThucThanhToan;
use App\Models\LoaiSanPham;
use App\Models\NhomSanPham;
use App\Models\DoanhNghiep;
use App\Models\DonHang;
use App\Models\TaiKhoan;
use App\Models\DonHang_ChiTiet;
use App\Models\BaiViet;
use App\Models\HinhAnh;
use App\Models\ChuDe;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use App\Models\DonViQuanLy;
use App\Models\ChiTiet_PhanHang_SanPham;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    

    public function __construct()
    {
        
    }
    
    public function getHome()
    {
        
        $sanpham = SanPham::select( 'sanpham.*',
        DB::raw('(select hinhanh from hinhanh where sanpham_id = sanpham.id  limit 1) as hinhanh'))
        ->where('sanpham.hienthi',1)
        ->where('sanpham.soluong','>',0)
        ->paginate(8);
       
         $doanhnghiep = DoanhNghiep::all();
         $baiviet = BaiViet::where('kiemduyet',0)->get();
         $nhomsanpham = NhomSanPham::all();
         $donviquanly = DonViQuanLy::all();
        return view('frontend.index',compact('sanpham','doanhnghiep','baiviet','nhomsanpham','donviquanly'));
    }

    public function getTimKiem(Request $request)
    {
       
        $key = $request->get('key');
        $sanpham = SanPham::where('tensanpham','like','%'.$key.'%')->where('hienthi',1)->where('soluong','>','1')->paginate(12);
         $no_image = config('app.url') . '/public/Image/noimage.png';
        $hinhanh = HinhAnh::all();
        $hinhanh_first = array();
        foreach($hinhanh as $value)
        {
            $dir = 'storage/app/' . $value->thumuc . '/';
            if(file_exists($dir))
            {
                $files = scandir($dir);
                if(isset($files[2]))
                    $hinhanh_first[$value->id] = config('app.url') . '/'. $dir . $files[2];
                else
                    $hinhanh_first[$value->id] = $no_image;
            }
            else
                $hinhanh_first[$value->id] = $no_image;
        }
        $nhomsanpham = NhomSanPham::all();
        $phanhang= PhanHang::all();
        return view('frontend.sanpham.timkiem', compact('key','sanpham','hinhanh_first','hinhanh','nhomsanpham','phanhang'));
        //return view('frontend.timkiem', array('key' => $key ,'ketqua' => $ketqua ,'baiviet'=>$baiviet));
      
    }

   
    public function getDoanhNghiep($tendoanhnghiep_slug)
    {
        $doanhnghiep = DoanhNghiep::where('tendoanhnghiep_slug',$tendoanhnghiep_slug)->first();
         $no_image = config('app.url') . '/public/Image/noimage.png';
        $hinhanh = HinhAnh::all();
        $hinhanh_first = array();
        foreach($hinhanh as $value)
        {
            $dir = 'storage/app/' . $value->thumuc . '/';
            if(file_exists($dir))
            {
                $files = scandir($dir);
                if(isset($files[2]))
                    $hinhanh_first[$value->id] = config('app.url') . '/'. $dir . $files[2];
                else
                    $hinhanh_first[$value->id] = $no_image;
            }
            else
                $hinhanh_first[$value->id] = $no_image;
        }
        $taikhoan=TaiKhoan::where('doanhnghiep_id', $doanhnghiep->id)->first();
        $baiviet = BaiViet::where('taikhoan_id',$taikhoan->id)->get();
        return view('frontend.doanhnghiep',compact('doanhnghiep','hinhanh_first','hinhanh','baiviet'));
    }
    public function getSanPham()
    {
        $sanpham = SanPham::where('hienthi',1)->where('soluong','>','1')->orderBy('created_at', 'desc')->paginate(12);
        $no_image = config('app.url') . '/public/Image/noimage.png';
        $hinhanh = HinhAnh::all();
        $hinhanh_first = array();
        foreach($hinhanh as $value)
        {
            $dir = 'storage/app/' . $value->thumuc . '/';
            if(file_exists($dir))
            {
                $files = scandir($dir);
                if(isset($files[2]))
                    $hinhanh_first[$value->id] = config('app.url') . '/'. $dir . $files[2];
                else
                    $hinhanh_first[$value->id] = $no_image;
            }
            else
                $hinhanh_first[$value->id] = $no_image;
        }
        $nhomsanpham = NhomSanPham::all();
        $phanhang= PhanHang::all();
        return view('frontend.sanpham.sanpham',compact('sanpham','hinhanh_first','hinhanh','nhomsanpham','phanhang'));
    }
    public function getSanPham_Nhom($tennhom_slug)
    {
        $no_image = config('app.url') . '/public/Image/noimage.png';
        $hinhanh = HinhAnh::all();
        $hinhanh_first = array();
        foreach($hinhanh as $value)
        {
            $dir = 'storage/app/' . $value->thumuc . '/';
            if(file_exists($dir))
            {
                $files = scandir($dir);
                if(isset($files[2]))
                    $hinhanh_first[$value->id] = config('app.url') . '/'. $dir . $files[2];
                else
                    $hinhanh_first[$value->id] = $no_image;
            }
            else
                $hinhanh_first[$value->id] = $no_image;
        }
        $nhomsanpham = NhomSanPham::where('tennhom_slug',$tennhom_slug)->first();
        $loaisanpham = LoaiSanPham::where('nhomsanpham_id',$nhomsanpham->id)->get();
       // $sanpham = SanPham::where('loaisanpham_id',$loaisanpham->nhomsanpham->id)->get();
        $phanhang= PhanHang::all();
       
        return view('frontend.sanpham.sanpham_nhom',compact('hinhanh_first','hinhanh','loaisanpham','nhomsanpham','phanhang'));
    }
    public function getSanPham_PhanHang($tenphanhang_slug)
    {
        $no_image = config('app.url') . '/public/Image/noimage.png';
        $hinhanh = HinhAnh::all();
        $hinhanh_first = array();
        foreach($hinhanh as $value)
        {
            $dir = 'storage/app/' . $value->thumuc . '/';
            if(file_exists($dir))
            {
                $files = scandir($dir);
                if(isset($files[2]))
                    $hinhanh_first[$value->id] = config('app.url') . '/'. $dir . $files[2];
                else
                    $hinhanh_first[$value->id] = $no_image;
            }
            else
                $hinhanh_first[$value->id] = $no_image;
        }
        $phanhang = PhanHang::where('tenphanhang_slug',$tenphanhang_slug)->first();
        $chitiet_phanhang_sanpham = ChiTiet_PhanHang_SanPham::where('phanhang_id',$phanhang->id)->get();
        $nhomsanpham = NhomSanPham::all();
        return view('frontend.sanpham.sanpham_phanhang',compact('hinhanh_first','hinhanh','nhomsanpham','phanhang','chitiet_phanhang_sanpham'));
    }
    public function getSanPham_Loai($tennhom_slug,$tenloai_slug)
    {
         $no_image = config('app.url') . '/public/Image/noimage.png';
        $nhomsanpham = NhomSanPham::where('tennhom_slug',$tennhom_slug)->first();
        $loaisanpham = LoaiSanPham::where('tenloai_slug',$tenloai_slug)->first();
        $sanpham = SanPham::where('loaisanpham_id',$loaisanpham->id)->where('hienthi',1)->where('soluong','>','1')->get();
        $phanhang= PhanHang::all();
        $hinhanh = HinhAnh::all();
        $hinhanh_first = array();
        foreach($hinhanh as $value)
        {
            $dir = 'storage/app/' . $value->thumuc . '/';
            if(file_exists($dir))
            {
                $files = scandir($dir);
                if(isset($files[2]))
                    $hinhanh_first[$value->id] = config('app.url') . '/'. $dir . $files[2];
                else
                    $hinhanh_first[$value->id] = $no_image;
            }
            else
                $hinhanh_first[$value->id] = $no_image;
        }
        
        return view('frontend.sanpham.sanpham_loai',compact('nhomsanpham','loaisanpham','sanpham','phanhang','hinhanh_first','hinhanh'));
    }
    public function getSanPham_ChiTiet ($tennhom_slug,$tenloai_slug, $tensanpham_slug)
    {
        $nhomsanpham = NhomSanPham::where('tennhom_slug',$tennhom_slug)->first();
        $loaisanpham = LoaiSanPham::where('tenloai_slug',$tenloai_slug)->first();
        $sanpham= SanPham::where('tensanpham_slug',$tensanpham_slug)->where('hienthi',1)->where('soluong','>','1')->first();
        $hinhanh = HinhAnh::where('sanpham_id',$sanpham->id)->get();
        $loai = LoaiSanPham::where('nhomsanpham_id',$nhomsanpham->id)->get();
        return view('frontend.sanpham.sanpham_chitiet',compact('sanpham','nhomsanpham','loaisanpham','hinhanh','loai'));
    }
    public function getDangKy()
    {
        return view('khachhang.dangky');
    }
    
    public function getDangNhap()
    {
        return view('khachhang.dangnhap');
    }

    public function getGioHang()
    {
        if(Cart::count() <= 0)
            return view('frontend.giohang_rong');
        else
        {
           
            return view('frontend.giohang');
        }
    }
     
    public function getGioHang_Them($tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
        $hinhanh = HinhAnh::where('sanpham_id',$sanpham->id)->first();


        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                'image' => $hinhanh->thumuc.'/'.$hinhanh->hinhanh,
                
            ]
        ]);

        return redirect()->route('frontend.giohang');
    }
    public function getGioHang_ThemChiTiet(Request $request, $tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
        $hinhanh = HinhAnh::where('sanpham_id',$sanpham->id)->first();
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => $request->qty,
            'weight' => 0,
            'options' => [
                'image' => $hinhanh->thumuc.'/'.$hinhanh->hinhanh,
            ]
        ]);

        return redirect()->route('frontend');
    }
    public function getGioHang_Xoa($row_id)
    {
        Cart::remove($row_id);
        return redirect()->route('frontend.giohang');
    }
     
    public function getGioHang_XoaTatCa()
    {
         Cart::destroy();
         return redirect()->route('frontend.giohang');
    }
     
    public function getGioHang_Giam($row_id)
    {
         $row = Cart::get($row_id);
         if($row->qty > 1)
         {
         Cart::update($row_id, $row->qty - 1);
         }
         return redirect()->route('frontend.giohang');
    }
     
     public function getGioHang_Tang($row_id)
    {
         $row = Cart::get($row_id);
         $sanpham = SanPham::find($row->id);
         if($row->qty < $sanpham->soluong )
         {

            if($row->qty < 10)

            {
                Cart::update($row_id, $row->qty + 1);
                return redirect()->route('frontend.giohang');
            }
            else
             {
                return redirect()->route('frontend.giohang')->with('status','Sản Phẩm <strong>'.$sanpham->tensanpham.'</strong> chỉ được mua 1 lần / 10 sản phẩm');
             }
            
         }
         else
         {
            return redirect()->route('frontend.giohang')->with('status','Sản Phẩm <strong>'.$sanpham->tensanpham.'</strong> chỉ còn <strong>'.$sanpham->soluong.'</strong> sản phẩm không đủ số lượng');
         }
     
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
     public function getNhapThongTin()
    {
        
        $tinh = Tinh::all();
        return view('frontend.nhapthongtin',compact('tinh'));
   
    }
    public function postNhapThongTin(Request $request)
    {
        $this->validate($request, [
        'hoten' => ['required','string','max:191'],
         'tinh_id' => ['required'],
         'huyen_id' => ['required'],
         'xa_id' => ['required'],
         'tenduong' => ['required','string','max:191'],
         'email' => ['required', 'string', 'email', 'max:191'],
         'dienthoaigiaohang'=>['required','string','min:10','max:12'],
         ]);
         $tinh = Session::get('tinh');
         $huyen = Session::get('huyen');
         $tinh = Session::get('tinh');
         $hoten = Session::get('hoten');
         $tenduong = Session::get('tenduong');
         $email = Session::get('email');
         $dienthoaigiaohang = Session::get('dienthoaigiaohang');
        session([
                'tinh' => $request->tinh_id ,
                'huyen'=>$request->huyen_id,
                'xa'=>$request->xa_id,
                'tenduong'=>$request->tenduong,
                'hoten'=>$request->hoten,
                'email'=>$request->email,
                'dienthoaigiaohang'=>$request->dienthoaigiaohang,
                ]);



        
     return redirect()->route('frontend.dathang');
    }
    
    public function getDatHang()
    {
         
        $tinh = Session::get('tinh');
        $huyen = Session::get('huyen');
        $xa = Session::get('xa');
        $hoten = Session::get('hoten');
        $tenduong = Session::get('tenduong');
        $email = Session::get('email');
        $dienthoaigiaohang = Session::get('dienthoaigiaohang');
        $tinh = Tinh::where('id',$tinh)->first();
        $huyen = Huyen::where('id',$huyen)->first();
        $xa = Xa::where('id',$xa)->first();

        return view('frontend.dathang',compact('tinh','huyen','xa','hoten','tenduong','email','dienthoaigiaohang'));
   
    }
   
    public function getPhi(Request $request)
    {
        $phi = Huyen::where("id", $request->huyen_id)->pluck("phivanchuyen");

        return response()->json($phi);
    }
    public function postDatHang(Request $request)
    {
      
        $tinh = Session::get('tinh');
        $huyen = Session::get('huyen');
        $xa = Session::get('xa');
        $hoten = Session::get('hoten');
        $tenduong = Session::get('tenduong');
        $email = Session::get('email');
        $dienthoaigiaohang = Session::get('dienthoaigiaohang');



        $tinh = Tinh::where('id',$tinh)->first();
        $huyen = Huyen::where('id',$huyen)->first();
        $xa = Xa::where('id',$xa)->first();


         // Lưu vào đơn hàng
        $dh = new DonHang();
        if(Auth::check())
        {
            $dh->taikhoan_id = Auth::user()->id;
        }
        else
        {
            $dh->taikhoan_id = null;
        }
      
        $dh->xa_id = $xa->id;
        $dh->hinhthucthanhtoan_id = $request->hinhthucthanhtoan_id;
        
         $dh->tinhtrang_id = 1; // Đơn hàng mới
        $dh->hoten = $hoten;
        $dh->email = $email;
        
        
        
        
        $dh->tenduong = $tenduong;
       
        $dh->dienthoaigiaohang = $dienthoaigiaohang;
        $dh->ghichu = $request->ghichu;
        $dh->save();
         $phi = Huyen::where('id',$dh->huyen_id)->first();
         // Lưu vào đơn hàng chi tiết

         foreach(Cart::content() as $value)
         {
            //$tong = $phi->phivanchuyen + $value->total;
         $ct = new DonHang_ChiTiet();
         $ct->donhang_id = $dh->id;
         $ct->sanpham_id = $value->id;
         $ct->soluongban = $value->qty;
         $ct->dongiaban = $value->total;
         $ct->save();
         $sp = SanPham::find($value->id);
         $sp->soluong -=  $value->qty;
         $sp->save();
         }
     
     return redirect()->route('frontend.dathangthanhcong');
    }
    public function getDatHangThanhCong()
    {
    // Xóa giỏ hàng khi hoàn tất đặt hàng?
        Cart::destroy();

        return view('frontend.dathangthanhcong');
    }

     public function getTimKiem_BaiViet(Request $request)
    {
       
        $key = $request->get('key');
        $baiviet = BaiViet::where('tieude','like','%'.$key.'%')->paginate(8);
        $chude = ChuDe::all();
        $baivietnew = BaiViet::orderBy('created_at', 'desc')->paginate(3);
        return view('frontend.baiviet.baiviet_timkiem', compact('key','baiviet','chude','baivietnew'));
        //return view('frontend.timkiem', array('key' => $key ,'ketqua' => $ketqua ,'baiviet'=>$baiviet));
      
    }
    public function getBaiViet()
    {
        $chude = ChuDe::all();
        $baiviet = BaiViet::where('kiemduyet',0)->orderBy('created_at', 'desc')->paginate(8);
         $baivietnew = BaiViet::where('kiemduyet',0)->orderBy('created_at', 'desc')->paginate(3);
        return view('frontend.baiviet.baiviet',compact('baiviet','chude','baivietnew'));
    }
    public function LayHinhDauTien($strNoiDung)
    {
        $first_img = "";
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
        if(empty($output))
            return "./public/Image/noimage.png";
        else
            return $matches[1][0];
    }
    public function getBaiViet_ChiTiet($tenchude_slug,$tieude_slug)
    {
        $chude= ChuDe::all();
        $chude_rieng = ChuDe::where('tenchude_slug',$tenchude_slug)->first();
        $baiviettheochude = BaiViet::where('kiemduyet',0)->where('chude_id',$chude_rieng->id)->paginate(3);
        $baivietnew = BaiViet::where('kiemduyet',0)->orderBy('created_at', 'desc')->paginate(3);
        $bv = BaiViet::where('kiemduyet',0)->where('tieude_slug',$tieude_slug)->first();
        $baiviet = 'baiviet' . $tieude_slug;
        if (!Session::has($baiviet)) {
            baiviet::where('tieude_slug', $tieude_slug)->increment('luotxem');
            Session::put($baiviet, 1);
        }
            return view('frontend.baiviet.baiviet_chitiet',compact('baiviet','bv','baivietnew','chude','baiviettheochude'));
    }
    public function getBaiViet_ChuDe($tenchude_slug)
    {
        $chude= ChuDe::where('tenchude_slug',$tenchude_slug)->first();
        $baiviet = BaiViet::where('kiemduyet',0)->where('chude_id',$chude->id)->paginate(8);
        $chude_all = ChuDe::all();
        $baivietnew = BaiViet::where('kiemduyet',0)->orderBy('created_at', 'desc')->paginate(3);
        return view('frontend.baiviet.baiviet_chude',compact('baiviet','chude','chude_all','baivietnew'));
    }


    public function getLienHe()
    {
        return view('frontend.lienhe');
    }

    public function getForbidden()
    {
        return view('errors.403');
    }

}
