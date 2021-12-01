<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\TinhTrangController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DonHangChiTietController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\PhanHangController;

//Đăng Ký, đăng nhập, quên mật khẩu,...
Auth::routes();
// Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('home');





// Trang quản trị
Route::prefix('admin')->name('admin.')->group(function() {
    // Trang chủ quản trị
    Route::get('/', [AdminController::class, 'getHome'])->name('home');

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

     // Quản lý Loại sản phẩm
    Route::get('/loaisanpham', [LoaiSanPhamController::class, 'getDanhSach'])->name('loaisanpham');
    Route::get('/loaisanpham/them', [LoaiSanPhamController::class, 'getThem'])->name('loaisanpham.them');
    Route::post('/loaisanpham/them', [LoaiSanPhamController::class, 'postThem'])->name('loaisanpham.them');
    Route::get('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'getSua'])->name('loaisanpham.sua');
    Route::post('/loaisanpham/sua/{id}', [LoaiSanPhamController::class, 'postSua'])->name('loaisanpham.sua');
    Route::get('/loaisanpham/xoa/{id}', [LoaiSanPhamController::class, 'getXoa'])->name('loaisanpham.xoa');

    // Quản lý Tinh
    Route::get('/tinh', [TinhController::class, 'getDanhSach'])->name('tinh');
    Route::get('/tinh/them', [TinhController::class, 'getThem'])->name('tinh.them');
    Route::post('/tinh/them', [TinhController::class, 'postThem'])->name('tinh.them');
    Route::get('/tinh/sua/{id}', [TinhController::class, 'getSua'])->name('tinh.sua');
    Route::post('/tinh/sua/{id}', [TinhController::class, 'postSua'])->name('tinh.sua');
    Route::get('/tinh/xoa/{id}', [TinhController::class, 'getXoa'])->name('tinh.xoa');
    Route::post('/tinh/nhap', [TinhController::class, 'postNhap'])->name('tinh.nhap');
    

    // Quản lý Huyen
    Route::get('/huyen', [HuyenController::class, 'getDanhSach'])->name('huyen');
    Route::get('/huyen/them', [HuyenController::class, 'getThem'])->name('huyen.them');
    Route::post('/huyen/them', [HuyenController::class, 'postThem'])->name('huyen.them');
    Route::get('/huyen/sua/{id}', [HuyenController::class, 'getSua'])->name('huyen.sua');
    Route::post('/huyen/sua/{id}', [HuyenController::class, 'postSua'])->name('huyen.sua');
    Route::get('/huyen/xoa/{id}', [HuyenController::class, 'getXoa'])->name('huyen.xoa');
    Route::post('/huyen/nhap', [HuyenController::class, 'postNhap'])->name('huyen.nhap');


     // Quản lý Xa
    Route::get('/xa', [XaController::class, 'getDanhSach'])->name('xa');
    Route::get('/xa/them', [XaController::class, 'getThem'])->name('xa.them');
    Route::post('/xa/them', [XaController::class, 'postThem'])->name('xa.them');
    Route::get('/xa/sua/{id}', [XaController::class, 'getSua'])->name('xa.sua');
    Route::post('/xa/sua/{id}', [XaController::class, 'postSua'])->name('xa.sua');
    Route::get('/xa/xoa/{id}', [XaController::class, 'getXoa'])->name('xa.xoa');
    Route::post('/xa/nhap', [XaController::class, 'postNhap'])->name('xa.nhap');

    // Quản lý ChuDe
    Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude');
    Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them');
    Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them');
    Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua');
    Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua');
    Route::get('/chude/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('chude.xoa');

    // Quản lý Bai Viet
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua');
    Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa');


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


    // Quản lý Doanh Nghiep
    Route::get('/doanhnghiep', [DoanhNghiepController::class, 'getDanhSach'])->name('doanhnghiep');
    Route::get('/doanhnghiep/them', [DoanhNghiepController::class, 'getThem'])->name('doanhnghiep.them');
    Route::get('/doanhnghiep/getHuyen',[DoanhNghiepController::class, 'getHuyen'])->name('doanhnghiep.getHuyen');
    Route::get('/doanhnghiep/getXa',[DoanhNghiepController::class, 'getXa'])->name('doanhnghiep.getXa');
    Route::post('/doanhnghiep/them', [DoanhNghiepController::class, 'postThem'])->name('doanhnghiep.them');
    Route::get('/doanhnghiep/sua/{id}', [DoanhNghiepController::class, 'getSua'])->name('doanhnghiep.sua');
    Route::post('/doanhnghiep/sua/{id}', [DoanhNghiepController::class, 'postSua'])->name('doanhnghiep.sua');
    Route::get('/doanhnghiep/xoa/{id}', [DoanhNghiepController::class, 'getXoa'])->name('doanhnghiep.xoa');


    // Quản lý Nhan Vien
    Route::get('/nhanvien', [NhanVienController::class, 'getDanhSach'])->name('nhanvien');
    Route::get('/nhanvien/them', [NhanVienController::class, 'getThem'])->name('nhanvien.them');
     Route::get('/nhanvien/getHuyen',[NhanVienController::class, 'getHuyen'])->name('nhanvien.getHuyen');
    Route::get('/nhanvien/getXa',[NhanVienController::class, 'getXa'])->name('nhanvien.getXa');
    Route::post('/nhanvien/them', [NhanVienController::class, 'postThem'])->name('nhanvien.them');
    Route::get('/nhanvien/sua/{id}', [NhanVienController::class, 'getSua'])->name('nhanvien.sua');
    Route::post('/nhanvien/sua/{id}', [NhanVienController::class, 'postSua'])->name('nhanvien.sua');
    Route::get('/nhanvien/xoa/{id}', [NhanVienController::class, 'getXoa'])->name('nhanvien.xoa');


     // Quản lý Tình trạng đơn hàng
    Route::get('/tinhtrang', [TinhTrangController::class, 'getDanhSach'])->name('tinhtrang');
    Route::get('/tinhtrang/them', [TinhTrangController::class, 'getThem'])->name('tinhtrang.them');
    Route::post('/tinhtrang/them', [TinhTrangController::class, 'postThem'])->name('tinhtrang.them');
    Route::get('/tinhtrang/sua/{id}', [TinhTrangController::class, 'getSua'])->name('tinhtrang.sua');
    Route::post('/tinhtrang/sua/{id}', [TinhTrangController::class, 'postSua'])->name('tinhtrang.sua');
    Route::get('/tinhtrang/xoa/{id}', [TinhTrangController::class, 'getXoa'])->name('tinhtrang.xoa');

    // Quản lý Sản phẩm
    Route::get('/sanpham', [SanPhamController::class, 'getDanhSach'])->name('sanpham');
    Route::get('/sanpham/them', [SanPhamController::class, 'getThem'])->name('sanpham.them');
    Route::get('/sanpham/getLoai',[SanPhamController::class, 'getLoai'])->name('sanpham.getLoai');
    Route::post('/sanpham/them', [SanPhamController::class, 'postThem'])->name('sanpham.them');
    Route::get('/sanpham/sua/{id}', [SanPhamController::class, 'getSua'])->name('sanpham.sua');
    Route::post('/sanpham/sua/{id}', [SanPhamController::class, 'postSua'])->name('sanpham.sua');
    Route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'getXoa'])->name('sanpham.xoa');
    Route::post('/sanpham/nhap', [SanPhamController::class, 'postNhap'])->name('sanpham.nhap');
    Route::get('/sanpham/xuat', [SanPhamController::class, 'getXuat'])->name('sanpham.xuat');

    // Quản lý Đơn hàng
    Route::get('/donhang', [DonHangController::class, 'getDanhSach'])->name('donhang');
    Route::get('/donhang/them', [DonHangController::class, 'getThem'])->name('donhang.them');
    Route::post('/donhang/them', [DonHangController::class, 'postThem'])->name('donhang.them');
    Route::get('/donhang/sua/{id}', [DonHangController::class, 'getSua'])->name('donhang.sua');
    Route::post('/donhang/sua/{id}', [DonHangController::class, 'postSua'])->name('donhang.sua');
    Route::get('/donhang/xoa/{id}', [DonHangController::class, 'getXoa'])->name('donhang.xoa');

    // Quản lý Đơn hàng chi tiết
    Route::get('/donhang/chitiet', [DonHangChiTietController::class, 'getDanhSach'])->name('donhang.chitiet');
    Route::get('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'getSua'])->name('donhang.chitiet.sua');
    Route::post('/donhang/chitiet/sua/{id}', [DonHangChiTietController::class, 'postSua'])->name('donhang.chitiet.sua');
    Route::get('/donhang/chitiet/xoa/{id}', [DonHangChiTietController::class, 'getXoa'])->name('donhang.chitiet.xoa');

    // Quản lý Tài khoản Quản Lý 
    Route::get('/taikhoan/admin', [TaiKhoanController::class, 'getDanhSach_Admin'])->name('taikhoan_admin');
    Route::get('/taikhoan/admin/them', [TaiKhoanController::class, 'getThem_Admin'])->name('taikhoan_admin.them');
    Route::post('/taikhoan/admin/them', [TaiKhoanController::class, 'postThem_Admin'])->name('taikhoan_admin.them');
    Route::get('/taikhoan/admin/sua/{id}', [TaiKhoanController::class, 'getSua_Admin'])->name('taikhoan_admin.sua');
    Route::post('/taikhoan/admin/sua/{id}', [TaiKhoanController::class, 'postSua_Admin'])->name('taikhoan_admin.sua');
    Route::get('/taikhoan/admin/xoa/{id}', [TaiKhoanController::class, 'getXoa_Admin'])->name('taikhoan_admin.xoa');

    // Quản lý Tài khoản Đơn Vị Quản Lý
    Route::get('/taikhoan/donviquanly', [TaiKhoanController::class, 'getDanhSach_DonViQuanLy'])->name('taikhoan_donviquanly');
    Route::get('/taikhoan/donviquanly/them', [TaiKhoanController::class, 'getThem_Admin'])->name('taikhoan_admin.them');
    Route::post('/taikhoan/donviquanly/them', [TaiKhoanController::class, 'postThem_Admin'])->name('taikhoan_admin.them');
    Route::get('/taikhoan/donviquanly/sua/{id}', [TaiKhoanController::class, 'getSua_Admin'])->name('taikhoan_admin.sua');
    Route::post('/taikhoan/donviquanly/sua/{id}', [TaiKhoanController::class, 'postSua_Admin'])->name('taikhoan_admin.sua');
    Route::get('/taikhoan/donviquanly/xoa/{id}', [TaiKhoanController::class, 'getXoa_Admin'])->name('taikhoan_admin.xoa');


});
