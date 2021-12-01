<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\LoaiHinhKinhDoanh;
class CreateLoaiHinhKinhDoanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('loaihinhkinhdoanh', function (Blueprint $table) {
            $table->id();
             $table->string('tenloaihinhkinhdoanh');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
        LoaiHinhKinhDoanh::create(['tenloaihinhkinhdoanh' => 'Hộ Gia Đình']);
        LoaiHinhKinhDoanh::create(['tenloaihinhkinhdoanh' => 'Cơ Sở Sản Xuất']);
        LoaiHinhKinhDoanh::create(['tenloaihinhkinhdoanh' => 'Hợp Tác Xã']);
        LoaiHinhKinhDoanh::create(['tenloaihinhkinhdoanh' => 'Tổ Hợp Tác/Nhóm Sản Xuất']);
        LoaiHinhKinhDoanh::create(['tenloaihinhkinhdoanh' => 'Doanh Nghiệp Liên Kết']);
        LoaiHinhKinhDoanh::create(['tenloaihinhkinhdoanh' => 'Doanh Nghiệp Liên Doanh']);
        LoaiHinhKinhDoanh::create(['tenloaihinhkinhdoanh' => 'Doanh Nghiệp 100% Vốn Nước Ngoài']);






    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaihinhkinhdoanh');
    }
}
