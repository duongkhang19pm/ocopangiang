<?php

namespace App\Http\Controllers;
use Storage;
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

use App\Models\DanhGia;
use App\Models\ChuDe;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use App\Models\DonViQuanLy;
use App\Models\ChiTiet_PhanHang_SanPham;
use App\Models\SanPhamYeuThich;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Mail\DatHangEmail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Socialite;

class HomeController extends Controller
{
    

    public function __construct()
    {
        
    }
    
    public function getHome()
    {
       
        $sanpham = SanPham::where('sanpham.hienthi',1)->where('sanpham.soluong','>',0)->orderBy('created_at', 'desc')->paginate(8);
        $doanhnghiep = DoanhNghiep::all();
        $baiviet = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->paginate(6);
        $nhomsanpham = NhomSanPham::orderBy('created_at', 'desc')->get();
        $donviquanly = DonViQuanLy::all();
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.index',compact('sanpham','doanhnghiep','baiviet','nhomsanpham','donviquanly','sanphamyeuthich'));
        }
        else
        return view('frontend.index',compact('sanpham','doanhnghiep','baiviet','nhomsanpham','donviquanly'));
        
    }

    public function getThongKe()
    {
       
        $sanpham = SanPham::where([['sanpham.hienthi',1],['sanpham.soluong','>',0]])->get();
        $doanhnghiep = DoanhNghiep::all();
        $sanpham5sao = ChiTiet_PhanHang_SanPham::join('sanpham','chitiet_phanhang_sanpham.sanpham_id','=','sanpham.id')
            ->join('phanhang','chitiet_phanhang_sanpham.phanhang_id','=','phanhang.id')
            ->where([['chitiet_phanhang_sanpham.phanhang_id',5],['sanpham.hienthi',1],['sanpham.soluong','>',0]])
            ->get();


        $thongke_theonhom = ChiTiet_PhanHang_SanPham::join('sanpham','chitiet_phanhang_sanpham.sanpham_id','=','sanpham.id')
        ->join('phanhang','chitiet_phanhang_sanpham.phanhang_id','=','phanhang.id')
        ->join('loaisanpham','sanpham.loaisanpham_id','=','loaisanpham.id')
            ->leftJoin('nhomsanpham','nhomsanpham.id','=','loaisanpham.nhomsanpham_id')
            ->where([['chitiet_phanhang_sanpham.phanhang_id',5],['sanpham.hienthi',1],['sanpham.soluong','>',0]])
            ->select( 'nhomsanpham.tennhom as ten', DB::raw('COUNT(sanpham.id) as soluong'))
            ->groupBy('nhomsanpham.tennhom')
            ->get();

        foreach($thongke_theonhom as $row) 
        {
            $data[] = array(
                'label'=> $row->ten,
                'y'=> $row->soluong,
                
            );
           
        }
        $data['chart_data'] = ($data);

        

        $sanpham_doanhnghiep = ChiTiet_PhanHang_SanPham::join('sanpham','chitiet_phanhang_sanpham.sanpham_id','=','sanpham.id')
        ->join('phanhang','chitiet_phanhang_sanpham.phanhang_id','=','phanhang.id')
        ->join('loaisanpham','sanpham.loaisanpham_id','=','loaisanpham.id')
            ->join('doanhnghiep','sanpham.doanhnghiep_id','=','doanhnghiep.id')
            ->where([['chitiet_phanhang_sanpham.phanhang_id',5],['sanpham.hienthi',1],['sanpham.soluong','>',0]])
            ->select('doanhnghiep.tendoanhnghiep as tendoanhnghiep', DB::raw('COUNT(sanpham.id) as soluong'))
            ->groupBy('doanhnghiep.tendoanhnghiep')
            ->get();
      //  dd($sanpham_doanhnghiep);
        foreach($sanpham_doanhnghiep as $row) 
        {
            $data1[] = array(
                'label'=> $row->tendoanhnghiep,
                'y'=> $row->soluong,
                
            );
           
        }
       $data['chart_doanhnghiep_sanpham'] = ($data1) ;


       $sanpham = SanPham::where([['sanpham.hienthi',1],['sanpham.soluong','>',0]])->get();
       
            foreach($sanpham as $row) 
            {
                $data2[] = array(
                    'name'=> $row->tensanpham,
                    'x'=> $row->dongia,
                    'y'=> $row->id,
                    'z'=>$row->luotxem,
                    
                );
            
            }
        
            $data['chart_sanpham_yeuthich'] = ($data2) ;
       
       //dd($sanpham_yeuthich);
      
      
        //dd([$data,$data1]);
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.thongke.thongke',compact('sanpham','doanhnghiep','sanpham5sao','sanphamyeuthich'),$data);
        }
        else
        return view('frontend.thongke.thongke',compact('sanpham','doanhnghiep','sanpham5sao'),$data);
        
    }
     

    public function searchSanPham(Request $request)
    {

        $sanpham = SanPham::join('loaisanpham','sanpham.loaisanpham_id','=','loaisanpham.id')
        ->join('nhomsanpham','loaisanpham.nhomsanpham_id','=','nhomsanpham.id')
        ->where('tensanpham', 'like', '%' . $request->value . '%')
        ->select('sanpham.*','loaisanpham.tenloai_slug','nhomsanpham.tennhom_slug')
        ->get();
       //dd(response()->json($taikhoan));

        return response()->json($sanpham); 

    }
    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function getGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->stateless()
            ->user();
        }
        catch(Exception $e)
        {
            return redirect()->route('khachhang.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
        }
        
        $existingUser = TaiKhoan::where('email', $user->email)->first();
        if($existingUser)
        {
            // Nếu người dùng đã tồn tại thì đăng nhập
            Auth::login($existingUser, true);
            return redirect()->route('khachhang.home');
        }
        else
        {
            // Nếu chưa tồn tại người dùng thì thêm mới
            $newUser = TaiKhoan::create([
            'name' => $user->name,
            'username' => Str::before($user->email, '@'),
            'email' => $user->email,
            'password' => Hash::make('ocopangiang@2022'), // Gán mật khẩu tự do
            ]);
            
            // Sau đó đăng nhập
            Auth::login($newUser, true);
            return redirect()->route('khachhang.home');
        }
    }

  
    public function getDonViQuanLy($tendonviquanly_slug)
    {
        $donviquanly = DonViQuanLy::where('tendonviquanly_slug',$tendonviquanly_slug)->first();
        
        $taikhoan=TaiKhoan::where('donviquanly_id', $donviquanly->id)->first();
        if(!empty($taikhoan))
        {
            $baiviet = BaiViet::where('taikhoan_id',$taikhoan->id)->where('kiemduyet',1)->orderBy('created_at', 'desc')->paginate(12);
            return view('frontend.donviquanly',compact('donviquanly','baiviet','taikhoan'));
        }
        else{
            return view('frontend.donviquanly',compact('donviquanly','taikhoan'));
        }
       
      
       
    }
    public function getDoanhNghiep($tendoanhnghiep_slug)
    {
        $doanhnghiep = DoanhNghiep::where('tendoanhnghiep_slug',$tendoanhnghiep_slug)->first();
        
        $taikhoan=TaiKhoan::where('doanhnghiep_id', $doanhnghiep->id)->first();
        $baiviet = BaiViet::where('taikhoan_id',$taikhoan->id)->where('kiemduyet',1)->orderBy('created_at', 'desc')->get();
        $sanpham =SanPham::where('doanhnghiep_id',$doanhnghiep->id)->orderBy('created_at', 'desc')->get();
        
        return view('frontend.doanhnghiep',compact('doanhnghiep','baiviet','sanpham'));
    }
    public function getSanPham()
    {
        $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->take(12)->get();
        $nhomsanpham = NhomSanPham::orderBy('created_at', 'desc')->get();
        $phanhang= PhanHang::all();
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.sanpham.sanpham',compact('sanpham','nhomsanpham','phanhang','sanphamyeuthich'));
        }
        else
        return view('frontend.sanpham.sanpham',compact('sanpham','nhomsanpham','phanhang'));
    }
    public function postSanPham_Show(Request $request)
    {
        $soluong = $request->show + 12;
        $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->take( $soluong)->get();
        $nhomsanpham = NhomSanPham::orderBy('created_at', 'desc')->get();
        $phanhang= PhanHang::all();
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.sanpham.sanpham',compact('sanpham','nhomsanpham','phanhang','sanphamyeuthich'));
        }
        else
        return view('frontend.sanpham.sanpham',compact('sanpham','nhomsanpham','phanhang'));
    }
    public function postSanPham_LocDonGia(Request $request)
    {
        $nhomsanpham = NhomSanPham::orderBy('created_at', 'desc')->get();
        $phanhang= PhanHang::all();
       if($request->locgia == 'D200')
       {
            $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->where('dongia','<',200000)->get(); 
            session()->put('locgia', 'D200');
       }
       elseif ($request->locgia == 'D400')
       {
        $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->whereBetween('dongia',[200000,400000])->get(); 
        session()->put('locgia', 'D400');
       }
       elseif ($request->locgia == 'D600')
       {
        $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->whereBetween('dongia',[400000,600000])->get(); 
        session()->put('locgia', 'D600');
       }
       elseif ($request->locgia == 'D800')
       {
        $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->whereBetween('dongia',[600000,800000])->get(); 
        session()->put('locgia', 'D800');
       }
       elseif ($request->locgia == 'D1000')
       {
        $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->where('dongia','>',1000000)->get(); 
        session()->put('locgia', 'D40D10000');
       }
       else{
            $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->get(); 
            session()->put('locgia', 'default');
       }
       return view('frontend.sanpham.sanpham',compact('sanpham','nhomsanpham','phanhang'));
    }
    public function postSanPham(Request $request)
    {
        if($request->sapxep == 'BUY')
        {
            $sanpham = SanPham::leftJoin('donhang_chitiet', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->selectRaw('sanpham.*, coalesce(sum(donhang_chitiet.soluongban), 0) tongsoluongban')
            ->groupBy('sanpham.id')
            ->orderBy('tongsoluongban', 'desc')
            ->where('hienthi',1)
            ->where('soluong','>',0)
            ->paginate(21);
             session()->put('sapxep', 'BUY');
        }
        elseif($request->sapxep == 'NEW') 
        {
           $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->orderBy('created_at', 'desc')->paginate(21);
           session()->put('sapxep', 'NEW');
        }
        elseif($request->sapxep == 'ASC') 
        {

            $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->orderBy('dongia', 'asc')->paginate(21);

            session()->put('sapxep', 'ASC');
        }  
        elseif($request->sapxep == 'DESC') 
        {
            $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->orderBy('dongia', 'desc')->paginate(21);

            session()->put('sapxep', 'DESC');
        }      
        else 
        {
            $sanpham = SanPham::where('hienthi',1)->where('soluong','>',0)->paginate(21);


            session()->put('sapxep', 'default');
        }
         $nhomsanpham = NhomSanPham::all();
        $phanhang= PhanHang::all();
        return view('frontend.sanpham.sanpham',compact('sanpham','nhomsanpham','phanhang'));
    }

    public function getSanPham_Nhom($tennhom_slug)
    {
        $nhomsanpham = NhomSanPham::where('tennhom_slug',$tennhom_slug)->first();
        $loaisanpham = LoaiSanPham::where('nhomsanpham_id',$nhomsanpham->id)->get();
        $phanhang= PhanHang::all();
       
    
         
        
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.sanpham.sanpham_nhom',compact('loaisanpham','nhomsanpham','phanhang','sanphamyeuthich'));
        }
        else
        return view('frontend.sanpham.sanpham_nhom',compact('loaisanpham','nhomsanpham','phanhang'));
    }
    public function getSanPham_PhanHang($tenphanhang_slug)
    {
       
        
        $phanhang = PhanHang::where('tenphanhang_slug',$tenphanhang_slug)->first();
        $chitiet_phanhang_sanpham = ChiTiet_PhanHang_SanPham::where('phanhang_id',$phanhang->id)->get();
        $nhomsanpham = NhomSanPham::all();
       
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.sanpham.sanpham_phanhang',compact('nhomsanpham','phanhang','chitiet_phanhang_sanpham','sanphamyeuthich'));
        }
        else

        return view('frontend.sanpham.sanpham_phanhang',compact('nhomsanpham','phanhang','chitiet_phanhang_sanpham'));
    }
    public function getSanPham_Loai($tennhom_slug,$tenloai_slug)
    {
        
        $nhomsanpham = NhomSanPham::where('tennhom_slug',$tennhom_slug)->first();
        $loaisanpham = LoaiSanPham::where('tenloai_slug',$tenloai_slug)->first();
        $sanpham = SanPham::where('loaisanpham_id',$loaisanpham->id)->where('hienthi',1)->where('soluong','>',0)->paginate(21);
        $phanhang= PhanHang::all();
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.sanpham.sanpham_loai',compact('nhomsanpham','loaisanpham','sanpham','phanhang','sanphamyeuthich'));
        }
        else
        
        return view('frontend.sanpham.sanpham_loai',compact('nhomsanpham','loaisanpham','sanpham','phanhang'));
    }
    public function getSanPham_ChiTiet ($tennhom_slug,$tenloai_slug, $tensanpham_slug)
    {
        $nhomsanpham = NhomSanPham::where('tennhom_slug',$tennhom_slug)->first();
        $loaisanpham = LoaiSanPham::where('tenloai_slug',$tenloai_slug)->first();
        $sanpham= SanPham::where('tensanpham_slug',$tensanpham_slug)->where('hienthi',1)->where('soluong','>',0)->orderBy('created_at', 'desc')->first();
        $no_image = config('app.url') . '/public/Image/noimage.png';
        $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
        $all_files = array();
        $dir = '';
        if(is_null($sanpham->thumuc) || trim($sanpham->thumuc) == '')
            $all_files = null;
        else
        {
            $dir = '/storage/app/' . $sanpham->thumuc . '/';
            $files = Storage::files($sanpham->thumuc . '/');
            foreach($files as $file)
                $all_files[] = pathinfo($file);
        }
        $danhgia = DanhGia::where('sanpham_id',$sanpham->id)->where('hienthi',1)->get();
        
        $idsanpham = 'SP'.$sanpham->id;
        if(!session()->has($idsanpham))
        {
            $orm = SanPham::find($sanpham->id);
            $orm->luotxem = $orm->luotxem +1;
            $orm->save();
            session()->put($idsanpham,1);
        }




        
        $sanpham_lienquan = SanPham::where('loaisanpham_id',$loaisanpham->id)->orderBy('created_at', 'desc')->get();
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.sanpham.sanpham_chitiet',compact('sanpham','nhomsanpham','loaisanpham','all_files','dir','sanpham_lienquan','danhgia','sanphamyeuthich'));
        }
        else
        return view('frontend.sanpham.sanpham_chitiet',compact('sanpham','nhomsanpham','loaisanpham','all_files','dir','sanpham_lienquan','danhgia'));
    }
     public function postDanhGia(Request $request,$tennhom_slug,$tenloai_slug, $tensanpham_slug)
    {
        $this->validate($request, [
            'noidung' => ['required','string'],
        ],
        $messages = [
            'noidung.required' => 'Nội dung bình luận không được bỏ trống.',
        ]);
        $nhomsanpham = NhomSanPham::where('tennhom_slug',$tennhom_slug)->first();
        $loaisanpham = LoaiSanPham::where('tenloai_slug',$tenloai_slug)->first();
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
        $danhgia = DanhGia::where('sanpham_id', $sanpham->id)->where('hienthi', 1)->get();

        $orm = new DanhGia();
        $orm->taikhoan_id = Auth::user()->id;
        $orm->sanpham_id = $sanpham->id;
        $orm->noidung = $request->noidung;
        $orm->save();
        $no_image = config('app.url') . '/public/Image/noimage.png';
        $extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
        $all_files = array();
        $dir = '';
        if(is_null($sanpham->thumuc) || trim($sanpham->thumuc) == '')
            $all_files = null;
        else
        {
            $dir = '/storage/app/' . $sanpham->thumuc . '/';
            $files = Storage::files($sanpham->thumuc . '/');
            foreach($files as $file)
                $all_files[] = pathinfo($file);
        }
         $sanpham_lienquan = SanPham::where('loaisanpham_id',$loaisanpham->id)->orderBy('created_at', 'desc')->get();
        return view('frontend.sanpham.sanpham_chitiet', compact('sanpham','all_files','dir','sanpham_lienquan','danhgia','nhomsanpham','loaisanpham'))->with('status', 'Bạn đã đánh giá sản phẩm thành công ');
    }
    public function getDangKy()
    {
        return view('khachhang.dangky');
    }
    
    public function getDangNhap()
    {
        return view('khachhang.dangnhap');
    }
    public function getSanPhamYeuThich()
    {
        if(Auth::check())
        {
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->get();
            return view('frontend.sanphamyeuthich',compact('sanphamyeuthich'));
        }
        
        else
        {
           
            return view('khachhang.dangnhap');
        }
    }
    public function getSanPhamYeuThich_Them($tensanpham_slug)
    {
        if(Auth::check())
        {
            $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
            $sanphamyeuthich = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->where('sanpham_id',$sanpham->id)->first();
            if($sanphamyeuthich != null )
            {
                $orm=SanPhamYeuThich::where('id',$sanphamyeuthich->id);
                $orm->delete();

               
            }
            else{

                $orm = new SanPhamYeuThich ();
                $orm->sanpham_id = $sanpham->id;
                $orm->taikhoan_id = Auth::user()->id;
                $orm->save();
               
            }
               
            return redirect()->route('frontend');
        }
            
        else
        {
        
            return view('khachhang.dangnhap');
        }
    }
    public function getSanPhamYeuThich_Xoa($id)
    {
        $orm=SanPhamYeuThich::find($id);
        $orm->delete();
      
        return redirect()->route('frontend.sanphamyeuthich');
    }
    public function getSanPhamYeuThich_XoaTatCa()
    {
        $orm = SanPhamYeuThich::where('taikhoan_id',Auth::user()->id)->delete();
      
        return redirect()->route('frontend.sanphamyeuthich');
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
        


        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => 1,
            'weight' => 0,
            'options' => [
                
                'image'=>$sanpham->hinhanh,
            ]
        ]);

        return redirect()->back()->with('status', 'Đã thêm sản phẩm vào giỏ hàng');
    }
    public function getGioHang_ThemChiTiet(Request $request, $tensanpham_slug)
    {
        $sanpham = SanPham::where('tensanpham_slug', $tensanpham_slug)->first();
       
        Cart::add([
            'id' => $sanpham->id,
            'name' => $sanpham->tensanpham,
            'price' => $sanpham->dongia,
            'qty' => $request->qty,
            'weight' => 0,
            'options' => [
                'image'=>$sanpham->hinhanh,
            ]
        ]);

        return redirect()->back()->with('status', 'Đã thêm sản phẩm vào giỏ hàng');
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
        $dh->hoten = $hoten;
        $dh->email = $email;
        $dh->tenduong = $tenduong;
        $dh->dienthoaigiaohang = $dienthoaigiaohang;
        $dh->ghichu = $request->ghichu;
        $dh->save();
        
        //$phi = Huyen::where('id',$dh->huyen_id)->first();
        // Lưu vào đơn hàng chi tiết

         foreach(Cart::content() as $value)
         {
            //$tong = $phi->phivanchuyen + $value->priceTotal;
            $ct = new DonHang_ChiTiet();
            $ct->donhang_id = $dh->id;
            $ct->sanpham_id = $value->id;
            $ct->tinhtrang_id = 1; // Đơn hàng mới
            
            $ct->soluongban = $value->qty;
            $ct->dongiaban = $value->price;

            $ct->save();
            $sp = SanPham::find($value->id);
            $sp->soluong -=  $value->qty;
            $sp->save();
         }
     Mail::to( $dh->email)->send(new DatHangEmail($dh));
     return redirect()->route('frontend.dathangthanhcong')->with('status', 'Bạn đã đặt hàng thành công');
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
        $baiviet = BaiViet::where('tieude','like','%'.$key.'%')->where('kiemduyet',1)->orderBy('created_at', 'desc')->paginate(8);
        $chude = ChuDe::all();
        $baivietnew = BaiViet::orderBy('created_at', 'desc')->where('kiemduyet',1)->orderBy('created_at', 'desc')->paginate(3);
        return view('frontend.baiviet.baiviet_timkiem', compact('key','baiviet','chude','baivietnew'));
        //return view('frontend.timkiem', array('key' => $key ,'ketqua' => $ketqua ,'baiviet'=>$baiviet));
      
    }
    public function getBaiViet()
    {
        $chude = ChuDe::all();
        $baiviet = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->paginate(20);
         $baivietnew = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->paginate(3);
        return view('frontend.baiviet.baiviet',compact('baiviet','chude','baivietnew'));
    }
    public function LayHinhDauTien($strNoiDung)
    {
        $no_image = config('app.url') . '/public/Image/noimage.png';
        $first_img = "";
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
        if(empty($output))
            return  $no_image;
        else
            return $matches[1][0];
    }
    public function getBaiViet_ChiTiet($tenchude_slug,$tieude_slug)
    {
        $chude= ChuDe::all();
        $chude_rieng = ChuDe::where('tenchude_slug',$tenchude_slug)->first();
        $baiviettheochude = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->where('chude_id',$chude_rieng->id)->paginate(3);
        $baivietnew = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->orderBy('created_at', 'desc')->paginate(3);
        $bv = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->where('tieude_slug',$tieude_slug)->first();
        $baiviet = 'baiviet' . $tieude_slug;
        if (!Session::has($baiviet)) {
            baiviet::where('tieude_slug', $tieude_slug)->where('kiemduyet',1)->increment('luotxem');
            Session::put($baiviet, 1);
        }
            return view('frontend.baiviet.baiviet_chitiet',compact('baiviet','bv','baivietnew','chude','baiviettheochude'));
    }
    public function getBaiViet_ChuDe($tenchude_slug)
    {
        $chude= ChuDe::where('tenchude_slug',$tenchude_slug)->first();
        $baiviet = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->where('chude_id',$chude->id)->paginate(20);
        $chude_all = ChuDe::all();
        $baivietnew = BaiViet::where('kiemduyet',1)->orderBy('created_at', 'desc')->paginate(3);
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
