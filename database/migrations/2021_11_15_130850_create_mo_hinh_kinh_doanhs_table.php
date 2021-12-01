<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MoHinhKinhDoanh;
class CreateMoHinhKinhDoanhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mohinhkinhdoanh', function (Blueprint $table) {
              $table->id();
             $table->string('tenmohinhkinhdoanh');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
        MoHinhKinhDoanh::create(['tenmohinhkinhdoanh' => 'Cung Ứng Nguyên Liệu']);
        MoHinhKinhDoanh::create(['tenmohinhkinhdoanh' => 'Phân Phối Thương Mại - Bán Hàng']);
        MoHinhKinhDoanh::create(['tenmohinhkinhdoanh' => 'Sản Xuất Chế Biến']);
        MoHinhKinhDoanh::create(['tenmohinhkinhdoanh' => 'Công Ty Thương Mại']);
        MoHinhKinhDoanh::create(['tenmohinhkinhdoanh' => 'Công Ty Dịch Vụ']);
        MoHinhKinhDoanh::create(['tenmohinhkinhdoanh' => 'Hiệp Hội Thương Mại']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mohinhkinhdoanh');
    }
}
