<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ChucVu;
class CreateChucVusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('chucvu', function (Blueprint $table) {
            $table->id();
             $table->string('tenchucvu');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });
       ChucVu::create(['tenchucvu' => 'Giám Đốc Điều Hành ']);
       ChucVu::create(['tenchucvu' => 'Giám Đốc Tài Chính ']);
       ChucVu::create(['tenchucvu' => 'Giám Đốc Tiếp Thị']);
       ChucVu::create(['tenchucvu' => 'Giám Đốc Công Nghệ']);
       ChucVu::create(['tenchucvu' => 'Chủ Tịch']);
       ChucVu::create(['tenchucvu' => 'Phó Chủ Tịch']);
       ChucVu::create(['tenchucvu' => 'Chuyên Gia Tiếp Thị']);
        ChucVu::create(['tenchucvu' => 'Đại Diện Bán Hàng']);
         ChucVu::create(['tenchucvu' => 'Đại Diện Dịch Vụ Khách Hàng']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chucvu');
    }
}
