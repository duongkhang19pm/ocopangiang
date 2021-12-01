<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\NhomSanPham;
class CreateNhomSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhomsanpham', function (Blueprint $table) {
            $table->id();
             $table->string('tennhom');
             $table->string('tennhom_slug');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';

        });
        NhomSanPham::create(['tennhom' => 'Thực Phẩm','tennhom_slug' => 'thuc-pham']);
        NhomSanPham::create(['tennhom' => 'Đồ Uống','tennhom_slug' => 'do-uong']);
        NhomSanPham::create(['tennhom' => 'Nông Sản','tennhom_slug' => 'nong-san']);
        NhomSanPham::create(['tennhom' => 'Thảo Dược','tennhom_slug' => 'thao-duoc']);
        NhomSanPham::create(['tennhom' => 'Tiêu Dùng','tennhom_slug' => 'tieu-dung']);
        NhomSanPham::create(['tennhom' => 'Dịch Vụ','tennhom_slug' => 'dich-vu']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhomsanpham');
    }
}
