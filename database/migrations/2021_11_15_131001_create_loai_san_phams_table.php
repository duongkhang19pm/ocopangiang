<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LoaiSanPham;
class CreateLoaiSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nhomsanpham_id')->constrained('nhomsanpham')->onDelete('cascade');
            $table->string('tenloai');
            $table->string('tenloai_slug');
            $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
        LoaiSanPham::create(['nhomsanpham_id'=>'1','tenloai'=>'Thực Phẩm Chức Năng','tenloai_slug'=>'thuc-pham-chuc-nang']);
        LoaiSanPham::create(['nhomsanpham_id'=>'1','tenloai'=>'Thực Phẩm Đã Qua Chế Biến','tenloai_slug'=>'thuc-pham-da-qua-che-bien']);
        LoaiSanPham::create(['nhomsanpham_id'=>'1','tenloai'=>'Thực Phẩm Cấm Trại','tenloai_slug'=>'thuc-pham-cam-trai']);
        LoaiSanPham::create(['nhomsanpham_id'=>'1','tenloai'=>'Thực Phẩm Tươi Sống','tenloai_slug'=>'thuc-pham-tuoi-song']);
        LoaiSanPham::create(['nhomsanpham_id'=>'1','tenloai'=>'Thực Phẩm Đông Lạnh','tenloai_slug'=>'thuc-pham-dong=-lanh']);
        LoaiSanPham::create(['nhomsanpham_id'=>'2','tenloai'=>'Nước Uống Trái Cây','tenloai_slug'=>'nuoc-uong-trai-cay']);
        LoaiSanPham::create(['nhomsanpham_id'=>'2','tenloai'=>'Nước Uống Thường','tenloai_slug'=>'nuoc-uong-thuong']);
        LoaiSanPham::create(['nhomsanpham_id'=>'2','tenloai'=>'Nước Uống Có Cồn','tenloai_slug'=>'nuoc-uong-co-con']);
        LoaiSanPham::create(['nhomsanpham_id'=>'2','tenloai'=>'Nước Uống Có Ga','tenloai_slug'=>'nuoc-uong-co-ga']);
        LoaiSanPham::create(['nhomsanpham_id'=>'3','tenloai'=>'Trái Cây','tenloai_slug'=>'trai-cay']);
        LoaiSanPham::create(['nhomsanpham_id'=>'3','tenloai'=>'Hoa','tenloai_slug'=>'hoa']);
        LoaiSanPham::create(['nhomsanpham_id'=>'3','tenloai'=>'Rau Củ','tenloai_slug'=>'rau-cu']);
        LoaiSanPham::create(['nhomsanpham_id'=>'3','tenloai'=>'Cây Cỏ','tenloai_slug'=>'cay-co']);
        LoaiSanPham::create(['nhomsanpham_id'=>'4','tenloai'=>'Thảo Dược','tenloai_slug'=>'thao-duoc']);
        LoaiSanPham::create(['nhomsanpham_id'=>'4','tenloai'=>'Dược Liệu','tenloai_slug'=>'duoc-lieu']);
        LoaiSanPham::create(['nhomsanpham_id'=>'5','tenloai'=>'Tiêu Dùng Tiện Lợi','tenloai_slug'=>'tieu-dung-tien-loi']);
        LoaiSanPham::create(['nhomsanpham_id'=>'5','tenloai'=>'Tiêu Dùng Mua Sắm','tenloai_slug'=>'tieu-dung-mua-sam']);
        LoaiSanPham::create(['nhomsanpham_id'=>'5','tenloai'=>'Tiêu Dùng Đặc Biệt','tenloai_slug'=>'tieu-dung-dac-biet']);
        LoaiSanPham::create(['nhomsanpham_id'=>'5','tenloai'=>'Dịch Vụ','tenloai_slug'=>'dich-vu']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaisanpham');
    }
}
