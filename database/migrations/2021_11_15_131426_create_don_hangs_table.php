<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tinh_id')->constrained('tinh');
            $table->foreignId('huyen_id')->constrained('huyen');
            $table->foreignId('xa_id')->constrained('xa');
            $table->foreignId('hinhthucthanhtoan_id')->constrained('hinhthucthanhtoan');
            $table->foreignId('taikhoan_id')->nullable()->constrained('taikhoan');
            $table->foreignId('tinhtrang_id')->constrained('tinhtrang');
            $table->string('tenduong');
            $table->string('dienthoaigiaohang', 20);
            $table->string('hoten');
            $table->string('email')->unique();
            $table->string('SDT')->unique();
            $table->text('ghichu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
