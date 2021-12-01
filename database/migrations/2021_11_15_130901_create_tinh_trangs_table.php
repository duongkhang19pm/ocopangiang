<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TinhTrang;
class CreateTinhTrangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tinhtrang', function (Blueprint $table) {
             $table->id();
             $table->string('tinhtrang');
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';

        });
       TinhTrang::create(['tinhtrang' => 'Mới']);
       TinhTrang::create(['tinhtrang' => 'Đang Xác Nhận']);
       TinhTrang::create(['tinhtrang' => 'Đã Hủy']);
       TinhTrang::create(['tinhtrang' => 'Đang Đóng Gói']);
       TinhTrang::create(['tinhtrang' => 'Đang Đi Nhận']);
       TinhTrang::create(['tinhtrang' => 'Đang Chuyển']);
       TinhTrang::create(['tinhtrang' => 'Thất Bại']);
       TinhTrang::create(['tinhtrang' => 'Đang Chuyển Hoàn']);
       TinhTrang::create(['tinhtrang' => 'Đã Chuyển Hoàn']);
       TinhTrang::create(['tinhtrang' => 'Thành Công']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tinhtrang');
    }
}
