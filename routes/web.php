<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TKAdminController;
use App\Http\Controllers\TKDonViQuanLyController;
use App\Http\Controllers\TKDoanhNghiepController;
use App\Http\Controllers\TKKhachHangController;
use App\Http\Controllers\NhomSanPhamController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\TinhController;
use App\Http\Controllers\HuyenController;
use App\Http\Controllers\XaController;
use App\Http\Controllers\ChuDeController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\MoHinhKinhDoanhController;
use App\Http\Controllers\LoaiHinhKinhDoanhController;
use App\Http\Controllers\DoanhNghiepController;
use App\Http\Controllers\DonViQuanLyController;
use App\Http\Controllers\TinhTrangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DonHangChiTietController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\PhanHangController;
use App\Http\Controllers\DonViTinhController;
use App\Http\Controllers\QuyCachController;
use App\Http\Controllers\HinhThucThanhToanController;
use App\Http\Controllers\ChiTietPhanHangSanPhamController;
use App\Http\Controllers\DanhGiaController;

// Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('frontend');

Route::get('/403', [HomeController::class, 'getForbidden'])->name('403');

// Google OAuth
Route::get('/login/google', [HomeController::class, 'getGoogleLogin'])->name('google.login');
Route::get('/login/google/callback', [HomeController::class, 'getGoogleCallback'])->name('google.callback');
Route::get('/timkiem', [HomeController::class, 'getTimKiem'])->name('frontend.timkiem');
//Đăng Ký, đăng nhập, quên mật khẩu,...
Auth::routes();
// Trang Liên hệ
Route::get('/lien-he', [HomeController::class, 'getLienHe'])->name('frontend.lienhe');
// Trang Giới thiệu Doanh Nghiệp
Route::get('/doanh-nghiep/{tendoanhnghiep_slug}', [HomeController::class, 'getDoanhNghiep'])->name('frontend.doanhnghiep');
// Trang Giới thiệu Đơn Vị Quản Lý
Route::get('/don-vi-quan-ly/{tendonviquanly_slug}', [HomeController::class, 'getDonViQuanLy'])->name('frontend.donviquanly');
// Trang sản phẩm
Route::get('/san-pham', [HomeController::class, 'getSanPham'])->name('frontend.sanpham');
Route::post('/san-pham', [HomeController::class, 'postSanPham'])->name('frontend.sanpham');
Route::post('/san-pham/show', [HomeController::class, 'postSanPham_Show'])->name('frontend.sanpham.show');
Route::get('/san-pham/phan-hang/{tenphanhang_slug}', [HomeController::class, 'getSanPham_PhanHang'])->name('frontend.phanhang');

Route::get('/san-pham/{tennhom_slug}', [HomeController::class, 'getSanPham_Nhom'])->name('frontend.sanpham.nhomsanpham');
Route::post('/san-pham/show/{tennhom_slug}', [HomeController::class, 'postSanPham_NhomShow'])->name('frontend.sanpham.nhomsanpham.show');
Route::get('/san-pham/{tennhom_slug}/{tenloai_slug}', [HomeController::class, 'getSanPham_Loai'])->name('frontend.sanpham.loaisanpham');
Route::get('/san-pham/{tennhom_slug}/{tenloai_slug}/{tensanpham_slug}', [HomeController::class, 'getSanPham_ChiTiet'])->name('frontend.sanpham.chitiet');
Route::post('/san-pham/danh-gia/{tennhom_slug}/{tenloai_slug}/{tensanpham_slug}', [HomeController::class, 'postDanhGia'])->name('frontend.sanpham.danhgia');
// Trang Khách Hàng

//Trang bai viet


Route::get('/bai-viet', [HomeController::class, 'getBaiViet'])->name('frontend.baiviet');
Route::get('/bai-viet/{tenchude_slug}/{tieude_slug}', [HomeController::class, 'getBaiViet_ChiTiet'])->name('frontend.baiviet.chitiet');
Route::get('/bai-viet/{tenchude_slug}', [HomeController::class, 'getBaiViet_ChuDe'])->name('frontend.baiviet.chude');
Route::get('/baiviet/tim-kiem', [HomeController::class, 'getTimKiem_BaiViet'])->name('frontend.baiviet.timkiem');

// Trang giỏ hàng
Route::get('/gio-hang', [HomeController::class, 'getGioHang'])->name('frontend.giohang');
Route::get('/gio-hang/them/{tensanpham_slug}', [HomeController::class, 'getGioHang_Them'])->name('frontend.giohang.them');

Route::get('/gio-hang/them/chi-tiet/{tensanpham_slug}', [HomeController::class, 'getGioHang_ThemChiTiet'])->name('frontend.giohang.them.chitiet');
Route::get('/gio-hang/xoa', [HomeController::class, 'getGioHang_XoaTatCa'])->name('frontend.giohang.xoatatca');
Route::get('/gio-hang/xoa/{row_id}', [HomeController::class, 'getGioHang_Xoa'])->name('frontend.giohang.xoa');
Route::get('/gio-hang/giam/{row_id}', [HomeController::class, 'getGioHang_Giam'])->name('frontend.giohang.giam');
Route::get('/gio-hang/tang/{row_id}', [HomeController::class, 'getGioHang_Tang'])->name('frontend.giohang.tang');



/// Trang đặt hàng
Route::get('/nhap-thong-tin', [HomeController::class, 'getNhapThongTin'])->name('frontend.nhapthongtin');
Route::post('/nhap-thong-tin', [HomeController::class, 'postNhapThongTin'])->name('frontend.nhapthongtin');
Route::get('/dat-hang', [HomeController::class, 'getDatHang'])->name('frontend.dathang');
Route::post('/dat-hang', [HomeController::class, 'postDatHang'])->name('frontend.dathang');
Route::get('/dat-hang-thanh-cong', [HomeController::class, 'getDatHangThanhCong'])->name('frontend.dathangthanhcong');
Route::get('/getHuyen',[HomeController::class, 'getHuyen'])->name('getHuyen');
Route::get('/getXa',[HomeController::class, 'getXa'])->name('getXa');
Route::get('/getPhi',[HomeController::class, 'getPhi'])->name('getPhi');
/// Sản Phẩm yêu thích
Route::get('/san-pham-yeu-thich', [HomeController::class, 'getSanPhamYeuThich'])->name('frontend.sanphamyeuthich');
Route::get('/san-pham-yeu-thich/xoa-tat-ca', [HomeController::class, 'getSanPhamYeuThich_XoaTatCa'])->name('frontend.sanphamyeuthich.xoatatca');
Route::get('/san-pham-yeu-thich/{tensanpham_slug}', [HomeController::class, 'getSanPhamYeuThich_Them'])->name('frontend.sanphamyeuthich.them');
Route::get('/san-pham-yeu-thich/xoa/{id}', [HomeController::class, 'getSanPhamYeuThich_Xoa'])->name('frontend.sanphamyeuthich.xoa');

// Trang khách hàng đăng nhập, đăng ký
Route::get('/khach-hang/dang-ky', [HomeController::class, 'getDangKy'])->name('khachhang.dangky');
Route::get('/khach-hang/dang-nhap', [HomeController::class, 'getDangNhap'])->name('khachhang.dangnhap');



Route::prefix('khach-hang')->name('khachhang.')->group(function()
{

    // Trang chủ User
    Route::get('/', [TKKhachHangController::class, 'getHome'])->name('home');
    Route::get('/home', [TKKhachHangController::class, 'getHome'])->name('home');

    // Xem và cập nhật trạng thái đơn hàng
    Route::get('/don-hang/{id}', [TKKhachHangController::class, 'getDonHang'])->name('donhang');
    Route::get('/don-hang/huy/{taikhoan}/{id}', [TKKhachHangController::class, 'getDonHang_Huy'])->name('donhang.huy');
    Route::get('/don-hang/hienthi/{taikhoan}/{id}', [TKKhachHangController::class, 'getDonHang_HienThi'])->name('donhang.hienthi');
 
    // Cập nhật thông tin tài khoản
    Route::get('/cap-nhat-ho-so/{id}', [TKKhachHangController::class, 'getCapNhatHoSo'])->name('capnhathoso');
    Route::post('/cap-nhat-ho-so/{id}', [TKKhachHangController::class, 'postCapNhatHoSo'])->name('capnhathoso');

   



});

// Trang quản trị
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function() {
    // Trang chủ quản trị
    Route::get('/', [TKAdminController::class, 'getHome'])->name('home');
    Route::get('/home', [TKAdminController::class, 'getHome'])->name('home');
    // Quản lý phân hạng 

    Route::get('/phanhang', [PhanHangController::class, 'getDanhSach'])->name('phanhang');
    Route::get('/phanhang/them', [PhanHangController::class, 'getThem'])->name('phanhang.them');
    Route::post('/phanhang/them', [PhanHangController::class, 'postThem'])->name('phanhang.them');
    Route::get('/phanhang/sua/{id}', [PhanHangController::class, 'getSua'])->name('phanhang.sua');
    Route::post('/phanhang/sua/{id}', [PhanHangController::class, 'postSua'])->name('phanhang.sua');
    Route::get('/phanhang/xoa/{id}', [PhanHangController::class, 'getXoa'])->name('phanhang.xoa');

    // Quản lý Nhom sản phẩm
    Route::get('/nhomsanpham', [NhomSanPhamController::class, 'getDanhSach'])->name('nhomsanpham');
    Route::get('/nhomsanpham/them', [NhomSanPhamController::class, 'getThem'])->name('nhomsanpham.them');
    Route::post('/nhomsanpham/them', [NhomSanPhamController::class, 'postThem'])->name('nhomsanpham.them');
    Route::get('/nhomsanpham/sua/{id}', [NhomSanPhamController::class, 'getSua'])->name('nhomsanpham.sua');
    Route::post('/nhomsanpham/sua/{id}', [NhomSanPhamController::class, 'postSua'])->name('nhomsanpham.sua');
    Route::get('/nhomsanpham/xoa/{id}', [NhomSanPhamController::class, 'getXoa'])->name('nhomsanpham.xoa');

     // Quản lý Đơn vị tính
    Route::get('/donvitinh', [DonViTinhController::class, 'getDanhSach'])->name('donvitinh');
    Route::get('/donvitinh/them', [DonViTinhController::class, 'getThem'])->name('donvitinh.them');
    Route::post('/donvitinh/them', [DonViTinhController::class, 'postThem'])->name('donvitinh.them');
    Route::get('/donvitinh/sua/{id}', [DonViTinhController::class, 'getSua'])->name('donvitinh.sua');
    Route::post('/donvitinh/sua/{id}', [DonViTinhController::class, 'postSua'])->name('donvitinh.sua');
    Route::get('/donvitinh/xoa/{id}', [DonViTinhController::class, 'getXoa'])->name('donvitinh.xoa');


     // Quản lý Quy Cách
    Route::get('/quycach', [QuyCachController::class, 'getDanhSach'])->name('quycach');
    Route::get('/quycach/them', [QuyCachController::class, 'getThem'])->name('quycach.them');
    Route::post('/quycach/them', [QuyCachController::class, 'postThem'])->name('quycach.them');
    Route::get('/quycach/sua/{id}', [QuyCachController::class, 'getSua'])->name('quycach.sua');
    Route::post('/quycach/sua/{id}', [QuyCachController::class, 'postSua'])->name('quycach.sua');
    Route::get('/quycach/xoa/{id}', [QuyCachController::class, 'getXoa'])->name('quycach.xoa');

     // Quản lý Loại sản phẩm
    Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
    Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
    Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
    Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
    Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
    Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa');

    // Quản lý Tinh
    Route::get('/tinh', [TinhController::class, 'getDanhSach'])->name('tinh');
    Route::post('/tinh/nhap', [TinhController::class, 'postNhap'])->name('tinh.nhap');
    

    // Quản lý Huyen
    Route::get('/huyen', [HuyenController::class, 'getDanhSach'])->name('huyen');
    Route::get('/huyen/sua/{id}', [HuyenController::class, 'getSua'])->name('huyen.sua');
    Route::post('/huyen/sua/{id}', [HuyenController::class, 'postSua'])->name('huyen.sua');
    Route::post('/huyen/nhap', [HuyenController::class, 'postNhap'])->name('huyen.nhap');


     // Quản lý Xa
    Route::get('/xa', [XaController::class, 'getDanhSach'])->name('xa');
    Route::post('/xa/nhap', [XaController::class, 'postNhap'])->name('xa.nhap');

    // Quản lý ChuDe
    Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude');
    Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them');
    Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them');
    Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua');
    Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua');
    Route::get('/chude/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('chude.xoa');

    


    // Quản lý Chuc Vu
    Route::get('/chucvu', [ChucVuController::class, 'getDanhSach'])->name('chucvu');
    Route::get('/chucvu/them', [ChucVuController::class, 'getThem'])->name('chucvu.them');
    Route::post('/chucvu/them', [ChucVuController::class, 'postThem'])->name('chucvu.them');
    Route::get('/chucvu/sua/{id}', [ChucVuController::class, 'getSua'])->name('chucvu.sua');
    Route::post('/chucvu/sua/{id}', [ChucVuController::class, 'postSua'])->name('chucvu.sua');
    Route::get('/chucvu/xoa/{id}', [ChucVuController::class, 'getXoa'])->name('chucvu.xoa');


    // Quản lý Mo Hinh Kinh Doanh
    Route::get('/mohinhkinhdoanh', [MoHinhKinhDoanhController::class, 'getDanhSach'])->name('mohinhkinhdoanh');
    Route::get('/mohinhkinhdoanh/them', [MoHinhKinhDoanhController::class, 'getThem'])->name('mohinhkinhdoanh.them');
    Route::post('/mohinhkinhdoanh/them', [MoHinhKinhDoanhController::class, 'postThem'])->name('mohinhkinhdoanh.them');
    Route::get('/mohinhkinhdoanh/sua/{id}', [MoHinhKinhDoanhController::class, 'getSua'])->name('mohinhkinhdoanh.sua');
    Route::post('/mohinhkinhdoanh/sua/{id}', [MoHinhKinhDoanhController::class, 'postSua'])->name('mohinhkinhdoanh.sua');
    Route::get('/mohinhkinhdoanh/xoa/{id}', [MoHinhKinhDoanhController::class, 'getXoa'])->name('mohinhkinhdoanh.xoa');


    // Quản lý Loai Hinh Kinh Doanh
    Route::get('/loaihinhkinhdoanh', [LoaiHinhKinhDoanhController::class, 'getDanhSach'])->name('loaihinhkinhdoanh');
    Route::get('/loaihinhkinhdoanh/them', [LoaiHinhKinhDoanhController::class, 'getThem'])->name('loaihinhkinhdoanh.them');
    Route::post('/loaihinhkinhdoanh/them', [LoaiHinhKinhDoanhController::class, 'postThem'])->name('loaihinhkinhdoanh.them');
    Route::get('/loaihinhkinhdoanh/sua/{id}', [LoaiHinhKinhDoanhController::class, 'getSua'])->name('loaihinhkinhdoanh.sua');
    Route::post('/loaihinhkinhdoanh/sua/{id}', [LoaiHinhKinhDoanhController::class, 'postSua'])->name('loaihinhkinhdoanh.sua');
    Route::get('/loaihinhkinhdoanh/xoa/{id}', [LoaiHinhKinhDoanhController::class, 'getXoa'])->name('loaihinhkinhdoanh.xoa');

     // Quản lý Tình trạng đơn hàng
    Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang');
    Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them');
    Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them');
    Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua');
    Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua');
    Route::get('/tinhtrang/xoa/{id}', [TinhTrangController::class, 'getXoa'])->name('tinhtrang.xoa');

     // Quản lý Hình Thức Thanh Toán
    Route::get('/hinhthucthanhtoan', [HinhThucThanhToanController::class, 'getDanhSach'])->name('hinhthucthanhtoan');
    Route::get('/hinhthucthanhtoan/them', [HinhThucThanhToanController::class, 'getThem'])->name('hinhthucthanhtoan.them');
    Route::post('/hinhthucthanhtoan/them', [HinhThucThanhToanController::class, 'postThem'])->name('hinhthucthanhtoan.them');
    Route::get('/hinhthucthanhtoan/sua/{id}', [HinhThucThanhToanController::class, 'getSua'])->name('hinhthucthanhtoan.sua');
    Route::post('/hinhthucthanhtoan/sua/{id}', [HinhThucThanhToanController::class, 'postSua'])->name('hinhthucthanhtoan.sua');
    Route::get('/hinhthucthanhtoan/xoa/{id}', [HinhThucThanhToanController::class, 'getXoa'])->name('hinhthucthanhtoan.xoa');



    


    // Quản lý Tài khoản Quản Lý 
    Route::get('/taikhoan/admin/getHuyen',[TaiKhoanController::class, 'getHuyen'])->name('taikhoan_admin.getHuyen');
    Route::get('/taikhoan/admin/getXa',[TaiKhoanController::class, 'getXa'])->name('taikhoan_admin.getXa');
    Route::get('/taikhoan/admin', [TaiKhoanController::class, 'getDanhSach_Admin'])->name('taikhoan_admin');
    Route::get('/taikhoan/admin/them', [TaiKhoanController::class, 'getThem_Admin'])->name('taikhoan_admin.them');
    Route::post('/taikhoan/admin/them', [TaiKhoanController::class, 'postThem_Admin'])->name('taikhoan_admin.them');
    Route::get('/taikhoan/admin/sua/{id}', [TaiKhoanController::class, 'getSua_Admin'])->name('taikhoan_admin.sua');
    Route::post('/taikhoan/admin/sua/{id}', [TaiKhoanController::class, 'postSua_Admin'])->name('taikhoan_admin.sua');
    Route::get('/taikhoan/admin/xoa/{id}', [TaiKhoanController::class, 'getXoa_Admin'])->name('taikhoan_admin.xoa');
    Route::get('/taikhoan/admin/hosocanhan/{id}', [TaiKhoanController::class, 'getHoSoCaNhan'])->name('taikhoan_admin.hosocanhan');
     Route::post('/taikhoan/admin/hosocanhan/{id}', [TaiKhoanController::class, 'postHoSoCaNhan'])->name('taikhoan_admin.hosocanhan');

    // Quản lý Tài khoản Khách Hàng 
    Route::get('/taikhoan/khachhang/getHuyen',[TaiKhoanController::class, 'getHuyen'])->name('taikhoan_khachhang.getHuyen');
    Route::get('/taikhoan/khachhang/getXa',[TaiKhoanController::class, 'getXa'])->name('taikhoan_khachhang.getXa');
    Route::get('/taikhoan/khachhang', [TaiKhoanController::class, 'getDanhSach_KhachHang'])->name('taikhoan_khachhang');
    Route::get('/taikhoan/khachhang/them', [TaiKhoanController::class, 'getThem_KhachHang'])->name('taikhoan_khachhang.them');
    Route::post('/taikhoan/khachhang/them', [TaiKhoanController::class, 'postThem_KhachHang'])->name('taikhoan_khachhang.them');
    Route::get('/taikhoan/khachhang/sua/{id}', [TaiKhoanController::class, 'getSua_KhachHang'])->name('taikhoan_khachhang.sua');
    Route::post('/taikhoan/khachhang/sua/{id}', [TaiKhoanController::class, 'postSua_KhachHang'])->name('taikhoan_khachhang.sua');
    Route::get('/taikhoan/khachhang/xoa/{id}', [TaiKhoanController::class, 'getXoa_KhachHang'])->name('taikhoan_khachhang.xoa');
     Route::get('/taikhoan/khachhang/kichhoat/{id}', [TaiKhoanController::class, 'getKichHoat_KhachHang'])->name('taikhoan_khachhang.kichhoat');

    // Quản lý Tài khoản Đơn Vị Quản Lý
    Route::get('/taikhoan/donviquanly/getHuyen',[TaiKhoanController::class, 'getHuyen'])->name('taikhoan_donviquanly.getHuyen');
    Route::get('/taikhoan/donviquanly/getXa',[TaiKhoanController::class, 'getXa'])->name('taikhoan_donviquanly.getXa');
    Route::get('/taikhoan/donviquanly', [TaiKhoanController::class, 'getDanhSach_DonViQuanLy'])->name('taikhoan_donviquanly');
    Route::get('/taikhoan/donviquanly/them', [TaiKhoanController::class, 'getThem_DonViQuanLy'])->name('taikhoan_donviquanly.them');
    Route::post('/taikhoan/donviquanly/them', [TaiKhoanController::class, 'postThem_DonViQuanLy'])->name('taikhoan_donviquanly.them');
    Route::get('/taikhoan/donviquanly/sua/{id}', [TaiKhoanController::class, 'getSua_DonViQuanLy'])->name('taikhoan_donviquanly.sua');
    Route::post('/taikhoan/donviquanly/sua/{id}', [TaiKhoanController::class, 'postSua_DonViQuanLy'])->name('taikhoan_donviquanly.sua');
    Route::get('/taikhoan/donviquanly/xoa/{id}', [TaiKhoanController::class, 'getXoa_DonViQuanLy'])->name('taikhoan_donviquanly.xoa');
    Route::get('/taikhoan/donviquanly/kichhoat/{id}', [TaiKhoanController::class, 'getKichHoat_DonViQuanLy'])->name('taikhoan_donviquanly.kichhoat');
    
    





    


    // Quản lý đơn vị quản lý
    Route::get('/donviquanly', [DonViQuanLyController::class, 'getDanhSach'])->name('donviquanly');
    Route::get('/donviquanly/them', [DonViQuanLyController::class, 'getThem'])->name('donviquanly.them');
     Route::get('/donviquanly/getHuyen',[DonViQuanLyController::class, 'getHuyen'])->name('donviquanly.getHuyen');
    Route::get('/donviquanly/getXa',[DonViQuanLyController::class, 'getXa'])->name('donviquanly.getXa');
    Route::post('/donviquanly/them', [DonViQuanLyController::class, 'postThem'])->name('donviquanly.them');
    Route::get('/donviquanly/sua/{id}', [DonViQuanLyController::class, 'getSua'])->name('donviquanly.sua');
    Route::post('/donviquanly/sua/{id}', [DonViQuanLyController::class, 'postSua'])->name('donviquanly.sua');
    Route::get('/donviquanly/xoa/{id}', [DonViQuanLyController::class, 'getXoa'])->name('donviquanly.xoa');
    Route::post('/donviquanly/nhap', [DonViQuanLyController::class, 'postNhap'])->name('donviquanly.nhap');
    Route::get('/donviquanly/xuat', [DonViQuanLyController::class, 'getXuat'])->name('donviquanly.xuat');

});


Route::prefix('donviquanly')->name('donviquanly.')->middleware('donviquanly')->group(function()
{

    // Trang chủ đơn vị quản lý 
    Route::get('/', [TKDonViQuanLyController::class, 'getHome'])->name('home');
    Route::get('/home', [TKDonViQuanLyController::class, 'getHome'])->name('home');

    Route::get('/hosocanhan/{id}', [TKDonViQuanLyController::class, 'getHoSoCaNhan'])->name('hosocanhan');
    Route::post('/hosocanhan/{id}', [TKDonViQuanLyController::class, 'postHoSoCaNhan'])->name('hosocanhan');
    Route::get('/baivietcanhan/{id}', [TKDonViQuanLyController::class, 'getBaiVietCaNhan'])->name('baivietcanhan');
    Route::get('/baiviet_chitiet/{id}', [TKDonViQuanLyController::class, 'getBaiVietChiTiet'])->name('baiviet_chitiet');
    Route::get('/donviquanly/getHuyen',[TKDonViQuanLyController::class, 'getHuyen'])->name('getHuyen');
    Route::get('/donviquanly/getXa',[TKDonViQuanLyController::class, 'getXa'])->name('getXa');

    // Quản lý Doanh Nghiep
    Route::get('/doanhnghiep', [DoanhNghiepController::class, 'getDanhSach'])->name('doanhnghiep');
    Route::get('/doanhnghiep/them', [DoanhNghiepController::class, 'getThem'])->name('doanhnghiep.them');
    Route::get('/doanhnghiep/getHuyen',[DoanhNghiepController::class, 'getHuyen'])->name('doanhnghiep.getHuyen');
    Route::get('/doanhnghiep/getXa',[DoanhNghiepController::class, 'getXa'])->name('doanhnghiep.getXa');
    Route::post('/doanhnghiep/them', [DoanhNghiepController::class, 'postThem'])->name('doanhnghiep.them');
    Route::get('/doanhnghiep/sua/{id}', [DoanhNghiepController::class, 'getSua'])->name('doanhnghiep.sua');
    Route::post('/doanhnghiep/sua/{id}', [DoanhNghiepController::class, 'postSua'])->name('doanhnghiep.sua');
    Route::get('/doanhnghiep/xoa/{id}', [DoanhNghiepController::class, 'getXoa'])->name('doanhnghiep.xoa');
     Route::post('/doanhnghiep/nhap', [DoanhNghiepController::class, 'postNhap'])->name('doanhnghiep.nhap');
    Route::get('/doanhnghiep/xuat', [DoanhNghiepController::class, 'getXuat'])->name('doanhnghiep.xuat');


    Route::get('/doanhnghiep/doanhthu_doanhnghiep/{id}',[DonHangController::class, 'getDoanhThu_DoanhNghiep'])->name('doanhnghiep.doanhthu_doanhnghiep');
    Route::get('/doanhnghiep/doanhthu',[DonHangController::class, 'getDoanhThu_DonViQuanLy'])->name('doanhnghiep.doanhthu');
    Route::get('/donviquanly/doanhthu/xuat', [DonHangController::class, 'getXuat'])->name('doanhthu.xuat');
    // Quản lý Tài khoản DoanhNghiep
    Route::get('/taikhoan/doanhnghiep/getHuyen',[TaiKhoanController::class, 'getHuyen'])->name('taikhoan_doanhnghiep.getHuyen');
    Route::get('/taikhoan/doanhnghiep/getXa',[TaiKhoanController::class, 'getXa'])->name('taikhoan_doanhnghiep.getXa');
    Route::get('/taikhoan/doanhnghiep', [TaiKhoanController::class, 'getDanhSach_DoanhNghiep'])->name('taikhoan_doanhnghiep');
    Route::get('/taikhoan/doanhnghiep/them', [TaiKhoanController::class, 'getThem_DoanhNghiep'])->name('taikhoan_doanhnghiep.them');
    Route::post('/taikhoan/doanhnghiep/them', [TaiKhoanController::class, 'postThem_DoanhNghiep'])->name('taikhoan_doanhnghiep.them');
    Route::get('/taikhoan/doanhnghiep/sua/{id}', [TaiKhoanController::class, 'getSua_DoanhNghiep'])->name('taikhoan_doanhnghiep.sua');
    Route::post('/taikhoan/doanhnghiep/sua/{id}', [TaiKhoanController::class, 'postSua_DoanhNghiep'])->name('taikhoan_doanhnghiep.sua');
    Route::get('/taikhoan/doanhnghiep/xoa/{id}', [TaiKhoanController::class, 'getXoa_DoanhNghiep'])->name('taikhoan_doanhnghiep.xoa');
    Route::get('/taikhoan/doanhnghiep/kichhoat/{id}', [TaiKhoanController::class, 'getKichHoat_DoanhNghiep'])->name('taikhoan_doanhnghiep.kichhoat');
    


      // Quản lý Bai Viet
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach_DonViQuanLy'])->name('baiviet');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem_DonViQuanLy'])->name('baiviet.them');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem_DonViQuanLy'])->name('baiviet.them');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua_DonViQuanLy'])->name('baiviet.sua');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua_DonViQuanLy'])->name('baiviet.sua');
    Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa_DonViQuanLy'])->name('baiviet.xoa');
    Route::get('/baiviet/kiemduyet/{id}', [BaiVietController::class, 'getKiemDuyet_DonViQuanLy'])->name('baiviet.kiemduyet');


});
//Trang Chủ doanh nghiệp 
Route::prefix('doanhnghiep')->name('doanhnghiep.')->middleware('doanhnghiep')->group(function()
{

    // Trang chủ Don Vi quan ly
    Route::get('/', [TKDoanhNghiepController::class, 'getHome'])->name('home');
    Route::get('/home', [TKDoanhNghiepController::class, 'getHome'])->name('home');
    Route::get('/hosocanhan/{id}', [TKDoanhNghiepController::class, 'getHoSoCaNhan'])->name('hosocanhan');
    Route::post('/hosocanhan/{id}', [TKDoanhNghiepController::class, 'postHoSoCaNhan'])->name('hosocanhan');
    Route::get('/doanhnghiep/getHuyen',[TKDoanhNghiepController::class, 'getHuyen'])->name('getHuyen');
    Route::get('/doanhnghiep/getXa',[TKDoanhNghiepController::class, 'getXa'])->name('getXa');
    Route::get('/baivietcanhan/{id}', [TKDoanhNghiepController::class, 'getBaiVietCaNhan'])->name('baivietcanhan');
    Route::get('/baiviet_chitiet/{id}', [TKDoanhNghiepController::class, 'getBaiVietChiTiet'])->name('baiviet_chitiet');
    // Quản lý Bai Viet
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua');
    Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa');
    Route::get('/baiviet/kiemduyet/{id}', [BaiVietController::class, 'getKiemDuyet'])->name('baiviet.kiemduyet');
    Route::get('/baiviet/binhluan/{id}', [BaiVietController::class, 'getBinhLuan'])->name('baiviet.binhluan');
     // Quản lý Sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
    
    Route::get('/sanpham/hienthi/{id}', [SanPhamController::class, 'getHienThi'])->name('sanpham.hienthi');
    Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
    Route::get('/sanpham/getLoai',[SanPhamController::class, 'getLoai'])->name('sanpham.getLoai');
    Route::get('/sanpham/getQuyCach',[SanPhamController::class, 'getQuyCach'])->name('sanpham.getQuyCach');
    Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
    Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');
    Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
    Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa');
    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat');
    Route::post('/sanpham/xemhinh', [SanPhamController::class, 'postHinhAnh'])->name('sanpham.xemhinh');
    Route::get('/sanpham/danhgia/{id}', [SanPhamController::class, 'getDanhGia'])->name('sanpham.danhgia');

    Route::get('/sanpham/saphet', [SanPhamController::class, 'getDanhSach_SPSapHet'])->name('sanpham.saphet');
    Route::get('/sanpham_saphet/xuat', [SanPhamController::class, 'getXuat_SPSapHet'])->name('sanpham_saphet.xuat');
  // Quản lý Đánh Giá Sản Phẩm
     Route::get('/danhgia/{tensanpham_slug}', [DanhGiaController::class, 'getDanhSach'])->name('danhgia');
     Route::get('/danhgia/hienthi/{id}', [DanhGiaController::class, 'getHienThi'])->name('danhgia.hienthi');
     Route::get('/danhgia/xoa/{id}', [DanhGiaController::class, 'getXoa'])->name('danhgia.xoa');
   


    // Quản lý Chi Tiet Phan Hang San Pham
    Route::get('/chitiet_phanhang_sanpham', [ChiTietPhanHangSanPhamController::class, 'getDanhSach'])->name('chitiet_phanhang_sanpham');
    Route::get('/chitiet_phanhang_sanpham/them', [ChiTietPhanHangSanPhamController::class, 'getThem'])->name('chitiet_phanhang_sanpham.them');
    Route::post('/chitiet_phanhang_sanpham/them', [ChiTietPhanHangSanPhamController::class, 'postThem'])->name('chitiet_phanhang_sanpham.them');
    Route::get('/chitiet_phanhang_sanpham/sua/{id}', [ChiTietPhanHangSanPhamController::class, 'getSua'])->name('chitiet_phanhang_sanpham.sua');
    Route::post('/chitiet_phanhang_sanpham/sua/{id}', [ChiTietPhanHangSanPhamController::class, 'postSua'])->name('chitiet_phanhang_sanpham.sua');
    Route::get('/chitiet_phanhang_sanpham/xoa/{id}', [ChiTietPhanHangSanPhamController::class, 'getXoa'])->name('chitiet_phanhang_sanpham.xoa');


    // Quản lý Đơn hàng
    Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
    Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
    Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
    Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
    Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
    Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');
    
    Route::get('/donhang/getHuyen',[DonHangController::class, 'getHuyen'])->name('donhang.getHuyen');
    Route::get('/donhang/getXa',[DonHangController::class, 'getXa'])->name('donhang.getXa');
    Route::post('/donhang/trangthai/{id}', [DonHangController::class, 'postTrangThai'])->name('donhang.trangthai');
    Route::get('/donhang/doanhthu',[DonHangController::class, 'getDoanhThu'])->name('donhang.doanhthu');
    Route::get('/donhang/ngay', [DonHangController::class, 'getDanhSach_DH_Ngay'])->name('donhang.ngay');
    Route::get('/donhang/moi', [DonHangController::class, 'getDanhSach_DH_Moi'])->name('donhang.moi');

    // Quản lý Đơn hàng chi tiết
    Route::get('/donhang/chitiet', [DonHangChiTietController::class, 'getDanhSach'])->name('donhang.chitiet');
    Route::get('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhang.chitiet.sua');
    Route::post('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhang.chitiet.sua');
    Route::get('/donhang/chitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhang.chitiet.xoa');


});

