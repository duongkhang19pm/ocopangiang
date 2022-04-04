<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BaiViet;
use App\Models\SanPham;
use App\Models\DonHang_ChiTiet;
use App\Models\DonHang;
use App\Models\TaiKhoan;
use App\Models\Tinh;
use App\Models\Huyen;
use App\Models\Xa;
use DB;

use Carbon\Carbon;
class TKDoanhNghiepController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getHome ()
    {
       
            $sanpham = SanPham::where('doanhnghiep_id',Auth::user()->doanhnghiep->id)->get();
            $sanpham_saphet = Sanpham::where('soluong','<',10)->where('doanhnghiep_id',Auth::user()->doanhnghiep->id)->get();
            $baiviet = BaiViet::where('taikhoan_id', Auth::user()->id)->get();
            foreach($sanpham as $value)
            {
                $chitiet = DonHang_ChiTiet::where('sanpham_id',$value->id)->where('tinhtrang_id',1)->get();
                 $dem = count($chitiet);
            }
           $donhang = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
            ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->leftJoin('tinhtrang', 'tinhtrang.id', '=', 'donhang_chitiet.tinhtrang_id')
            ->select('donhang.*')
                    
            ->where([
                ['sanpham.doanhnghiep_id',Auth::user()->doanhnghiep->id],
                ['tinhtrang.id',1],


            ])
           
            ->groupBy('donhang.id')
            ->get();
            
            $doanhthu = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
            ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
            ->select('donhang_chitiet.dongiaban as giaban','donhang_chitiet.created_at as day'
                      
                    )
            ->where([
               
                ['donhang_chitiet.tinhtrang_id',10],
                ['sanpham.doanhnghiep_id',Auth::user()->doanhnghiep->id]
            ])
            ->groupBy('donhang_chitiet.id')
            ->get();

            $date = Carbon::today();//lay ngay hien tai

            $doanhthuhomnay = DonHang_ChiTiet::leftJoin('donhang', 'donhang.id', '=', 'donhang_chitiet.donhang_id')
                ->leftJoin('sanpham', 'sanpham.id', '=', 'donhang_chitiet.sanpham_id')
                ->leftJoin('tinhtrang', 'tinhtrang.id', '=', 'donhang_chitiet.tinhtrang_id')
                ->select('sanpham.*',
                        DB::raw('sum(donhang_chitiet.soluongban) AS tongsoluongban'),
                        DB::raw('(select donhang_chitiet.dongiaban from donhang_chitiet limit 1) as dongiaban')
                        )
                ->whereBetween('donhang.created_at', [$date->format('Y-m-d')." 00:00:00", $date->format('Y-m-d')." 23:59:59"])
                ->where([
                    ['sanpham.doanhnghiep_id',Auth::user()->doanhnghiep->id],
                    ['donhang_chitiet.tinhtrang_id',10]
                    ])
                ->groupBy('sanpham.id')
                ->get();


                $data = [];
 
                foreach($doanhthu as $row) {
                    
                    $data['label'][] = Carbon::parse($row->day)->format('d/m/Y');
                    $data['data'][] = $row->giaban;
                }
            
                $data['chart_data'] = json_encode($data);
            
            return view('doanhnghiep.index',compact('baiviet','sanpham','donhang','doanhthuhomnay','sanpham_saphet'),$data);
        
        
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
     public function getHoSoCaNhan($id)
    {
        $taikhoan = TaiKhoan::find($id);
        $baiviet = BaiViet::where('taikhoan_id',$id)->get();
        $tinh = Tinh::all();
        $huyen =Huyen::all();
        $xa =Xa::all();
        return view('doanhnghiep.hosocanhan',compact('taikhoan', 'tinh','huyen','xa','baiviet'));
    }
    public function postHoSoCaNhan(Request $request,$id)
    {
       $request->validate([
        'tinh_id' => ['nullable'],
        'huyen_id'=>['nullable'],
        'xa_id'=>['nullable'],
        'tenduong'=>['nullable','string','max:191'],
        'name' => ['required', 'string', 'max:100'],
        'username' => ['required', 'max:255', 'unique:taikhoan,username,'.$id],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:taikhoan,email,'.$id],
        'phone'=>['required','string','min:10','max:12','unique:taikhoan,phone,'.$id],
        'password' => [ 'confirmed'],
        ]);
        if($request->hasFile('hinhanh'))
       {
            $orm=TaiKhoan::find($id);
            Storage::delete($orm->hinhanh);
            $extension = $request->file('hinhanh')->extension();
            $fileName = Str::slug($request->name,'-').'.'.$extension;
            // Upload vào thư mục và trả về đường dẫn
            $path = Storage::putFileAs('taikhoan/taikhoan_doanhnghiep', $request->file('hinhanh'), $fileName);

       }
        $orm = TaiKhoan::where('id', Auth::user()->id)->first();
      
        $orm->xa_id = $request->xa_id;
        $orm->tenduong = $request->tenduong;
        $orm->name = $request->name;
        $orm->username = $request->username;
        $orm->email = $request->email;
        $orm->phone = $request->phone;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        if($request->hasFile('hinhanh')) $orm->hinhanh = $path;
        $orm->save();

        return redirect()->route('doanhnghiep.hosocanhan',['id'=>$id]);
    }
    public function getBaiVietCaNhan($id)
    {
        $baiviet = BaiViet::where('taikhoan_id',$id)->get();
         $taikhoan = TaiKhoan::find($id);
        return view('doanhnghiep.baivietcanhan',compact('baiviet','taikhoan'));
    }
    public function getBaiVietChiTiet($id)
    {
        $baiviet = BaiViet::where('id',$id)->first();
         $taikhoan = TaiKhoan::where('id',Auth::user()->id)->first();
        return view('doanhnghiep.baiviet_chitiet',compact('baiviet','taikhoan'));
    }
}
